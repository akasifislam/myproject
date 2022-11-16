<?php

namespace App\View\Components\Sorting;

use Illuminate\View\Component;

class LevelSorting extends Component
{
    public $courseLevels, $totalCourseCount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($courseLevels, $totalCourseCount)
    {
        $this->courseLevels = $courseLevels;
        $this->totalCourseCount = $totalCourseCount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sorting.level-sorting');
    }
}
