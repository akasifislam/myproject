<?php

namespace App\View\Components\Event;

use Illuminate\View\Component;

class SingleEvent extends Component
{
    public $event, $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($event, $class = null)
    {
        $this->event = $event;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.event.single-event');
    }
}
