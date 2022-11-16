<?php

namespace App\View\Components\Courses;

use Illuminate\View\Component;

class ChapterTable extends Component
{
    public $chapters;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($chapters)
    {
        $this->chapters = $chapters;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.courses.chapter-table');
    }
}
