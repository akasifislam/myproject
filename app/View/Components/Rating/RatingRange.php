<?php

namespace App\View\Components\Rating;

use Illuminate\View\Component;

class RatingRange extends Component
{
    public $starsPercentages, $starsCounts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($starsPercentages, $starsCounts)
    {
        $this->starsPercentages = $starsPercentages;
        $this->starsCounts = $starsCounts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rating.rating-range');
    }
}
