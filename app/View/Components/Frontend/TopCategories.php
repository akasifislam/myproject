<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;

class TopCategories extends Component
{
    public $topCategories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topCategories)
    {
        $this->topCategories = $topCategories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.top-categories');
    }
}
