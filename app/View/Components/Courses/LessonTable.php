<?php

namespace App\View\Components\Courses;

use Illuminate\View\Component;

class LessonTable extends Component
{
    public $chapters, $lessons;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($chapters, $lessons)
    {
        $this->chapters = $chapters;
        $this->lessons = $lessons;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.courses.lesson-table');
    }
}
