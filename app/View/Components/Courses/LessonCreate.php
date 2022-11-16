<?php

namespace App\View\Components\Courses;

use Illuminate\View\Component;

class LessonCreate extends Component
{
    public $chapters, $course;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($chapters, $course)
    {
        $this->chapters = $chapters;
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.courses.lesson-create');
    }
}
