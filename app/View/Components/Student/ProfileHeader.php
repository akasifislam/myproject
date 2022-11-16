<?php

namespace App\View\Components\Student;

use Illuminate\View\Component;

class ProfileHeader extends Component
{
    public $student, $enrollCourses;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($student, $enrollCourses)
    {
        $this->student = $student;
        $this->enrollCourses = $enrollCourses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.student.profile-header');
    }
}
