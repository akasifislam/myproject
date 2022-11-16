<?php

namespace App\View\Components\Sorting;

use Illuminate\View\Component;

class RatingSorting extends Component
{
    public $filterRating;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filterRating)
    {
        $this->filterRating = $filterRating;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sorting.rating-sorting');
    }
}
