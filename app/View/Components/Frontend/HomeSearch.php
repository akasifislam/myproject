<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;

class HomeSearch extends Component
{
    public $allcategories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($allcategories)
    {
        $this->allcategories = $allcategories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.home-search');
    }
}
