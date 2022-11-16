<?php

namespace App\View\Components\Sorting;

use Illuminate\View\Component;

class Filtering extends Component
{
    public $sorting;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sorting)
    {
        $this->sorting = $sorting;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sorting.filtering');
    }
}
