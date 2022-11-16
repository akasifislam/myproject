<?php

namespace App\View\Components\Courses;

use Illuminate\View\Component;

class LessonEdit extends Component
{
    public $chapters, $course, $lesson;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($chapters, $course, $lesson)
    {
        $this->chapters = $chapters;
        $this->course = $course;
        $this->lesson = $lesson;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.courses.lesson-edit');
    }
}
