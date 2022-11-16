<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Modules\Chat\Entities\Chat;

class MessageComponent extends Component
{

    public $sender = null;
    public $senderName = '';
    public $students = [];
    public $isMessageBox = false;
    public $isEmpty = false;
    public $allMessages = [];
    public $message = '';
    public function mount()
    {
        $this->students = User::latest()->get(['id', 'firstname', 'lastname', 'slug', 'image']);
    }


    function getStudent(User $student)
    {
        $this->isMessageBox = true;
        $this->sender = $student;
        $this->senderName = $student->firstname . ' ' . $student->lastname;
        $this->allMessages = Chat::where('sender_id', auth('instructor')->id())->where('receiver_id', $student->id)->orWhere('sender_id', $student->id)->where('receiver_id', auth('instructor')->id())->orderBy('id', 'desc')->get();
    }

    function mountData()
    {
        if (isset($this->sender->id)) {
            $this->allMessages = Chat::where('sender_id', auth('instructor')->id())->where('receiver_id', $this->sender->id)->orWhere('sender_id', $this->sender->id)->where('receiver_id', auth('instructor')->id())->orderBy('id', 'desc')->get();

            $not_seen = Chat::where('sender_id', $this->sender->id)->where('receiver_id', auth('instructor')->id());
            $not_seen->update(['is_seen' => true]);
        }
    }

    public function sendMessage()
    {
        if ($this->message === '') {
            $this->isEmpty = true;
            return;
        }
        $chat = new Chat();
        $chat->message = $this->message;
        $chat->sender_id = auth('instructor')->id();
        $chat->senderType = 'instructor';
        $chat->receiver_id = $this->sender->id;
        $chat->save();
        $this->isEmpty = false;
        $this->resetForm();
    }

    function resetForm()
    {
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.message-component');
    }
}
