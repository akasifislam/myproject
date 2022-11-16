<?php

namespace App\View\Components\Sorting;

use Illuminate\View\Component;

class PriceSorting extends Component
{
    public $filterMin, $filterMax;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filterMin, $filterMax)
    {
        $this->filterMin = $filterMin;
        $this->filterMax = $filterMax;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sorting.price-sorting');
    }
}
