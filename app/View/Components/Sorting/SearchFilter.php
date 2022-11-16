<?php

namespace App\View\Components\Sorting;

use Illuminate\View\Component;

class SearchFilter extends Component
{
    public $filterSearch;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filterSearch)
    {
        $this->filterSearch = $filterSearch;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sorting.search-filter');
    }
}
