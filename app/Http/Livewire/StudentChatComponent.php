<?php

namespace App\Http\Livewire;

use App\Models\Instructor;
use App\Models\User;
use Livewire\Component;
use Modules\Chat\Entities\Chat;

class StudentChatComponent extends Component
{
    public $sender = null;
    public $senderName = '';
    public $instructors = [];
    public $isMessageBox = false;
    public $isEmpty = false;
    public $allMessages = [];
    public $message = '';

    public function mount()
    {
        $this->instructors = Instructor::latest()->get(['id', 'firstname', 'lastname', 'slug', 'image']);
    }


    public function getInstructor(Instructor $instructor)
    {
        $this->isMessageBox = true;
        $this->sender = $instructor;
        $this->senderName = $instructor->firstname . ' ' . $instructor->lastname;
        $this->allMessages = Chat::where('sender_id', auth('web')->id())->where('receiver_id', $instructor->id)->orWhere('sender_id', $instructor->id)->where('receiver_id', auth('instructor')->id())->orderBy('id', 'desc')->get();
    }

    function mountData()
    {
        if (isset($this->sender->id)) {
            $this->allMessages = Chat::where('sender_id', auth('web')->id())->where('receiver_id', $this->sender->id)->orWhere('sender_id', $this->sender->id)->where('receiver_id', auth('web')->id())->orderBy('id', 'desc')->get();

            $not_seen = Chat::where('sender_id', $this->sender->id)->where('receiver_id', auth('web')->id());
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
        $chat->sender_id = auth('web')->id();
        $chat->senderType = 'student';
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
        return view('livewire.student-chat-component');
    }
}
