<?php

namespace App\View\Components\Student;

use Illuminate\View\Component;

class ProfileInfo extends Component
{
    public $student;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($student)
    {
        $this->student = $student;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.student.profile-info');
    }
}
