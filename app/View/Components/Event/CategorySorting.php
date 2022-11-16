<?php

namespace App\View\Components\Event;

use Illuminate\View\Component;

class CategorySorting extends Component
{
    public $categories;
    public $allEvents;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $allEvents)
    {
        $this->categories = $categories;
        $this->allEvents = $allEvents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.event.category-sorting');
    }
}
