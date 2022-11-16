<?php

namespace App\View\Components\Instructor;

use Illuminate\View\Component;

class ChapterEdit extends Component
{
    public $chapter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($chapter)
    {
        $this->chapter = $chapter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.instructor.chapter-edit');
    }
}
