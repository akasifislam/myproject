<?php

namespace App\View\Components\Instructor;

use Illuminate\View\Component;

class ChapterCreate extends Component
{
    public $courseId;
    // public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($courseId)
    {
        // $this->title = $title;
        $this->courseId = $courseId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.instructor.chapter-create');
    }
}
