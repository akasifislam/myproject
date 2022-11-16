<?php

namespace App\View\Components\Coursedescription;

use Illuminate\View\Component;

class Comments extends Component
{
    public $comments, $courseId, $total, $course;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comments, $courseId, $total, $course)
    {
        $this->comments = $comments;
        $this->courseId = $courseId;
        $this->total = $total;
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.coursedescription.comments');
    }
}
