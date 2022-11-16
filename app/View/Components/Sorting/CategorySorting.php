<?php

namespace App\View\Components\Sorting;

use Illuminate\View\Component;

class CategorySorting extends Component
{
    public $filterCategory, $categories, $totalCourseCount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filterCategory, $categories, $totalCourseCount)
    {
        $this->filterCategory = $filterCategory;
        $this->categories = $categories;
        $this->totalCourseCount = $totalCourseCount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sorting.category-sorting');
    }
}
