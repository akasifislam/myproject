<?php

namespace App\View\Components\Sorting;

use Illuminate\View\Component;

class DurationSorting extends Component
{
    public $filterDuration, $durations, $totalCourseCount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filterDuration, $durations, $totalCourseCount)
    {
        $this->filterDuration = $filterDuration;
        $this->durations = $durations;
        $this->totalCourseCount = $totalCourseCount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sorting.duration-sorting');
    }
}
