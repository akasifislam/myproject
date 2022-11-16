<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;

class BestInstructors extends Component
{
    public $instructor;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($instructor)
    {
        $this->instructor = $instructor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.best-instructors');
    }
}
