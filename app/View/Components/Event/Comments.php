<?php

namespace App\View\Components\Event;

use Illuminate\View\Component;

class Comments extends Component
{
    public $comments;
    public $total;
    public $eventId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comments, $total, $eventId)
    {
        $this->comments = $comments;
        $this->total    = $total;
        $this->eventId  = $eventId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.event.comments');
    }
}
