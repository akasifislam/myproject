<?php

namespace App\View\Components\Courses;

use Illuminate\View\Component;

class WatchCourse extends Component
{
    public $enrollCourse;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($enrollCourse)
    {
        $this->enrollCourse =  $enrollCourse;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.courses.watch-course');
    }
}
