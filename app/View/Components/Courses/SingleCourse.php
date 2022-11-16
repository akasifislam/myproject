<?php

namespace App\View\Components\Courses;

use Illuminate\View\Component;

class SingleCourse extends Component
{
    public $course;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.courses.single-course');
    }
}
