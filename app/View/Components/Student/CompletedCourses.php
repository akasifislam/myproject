<?php

namespace App\View\Components\Student;

use Illuminate\View\Component;

class CompletedCourses extends Component
{
    public $enrollCourses;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($enrollCourses)
    {
        $this->enrollCourses = $enrollCourses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.student.completed-courses');
    }
}
