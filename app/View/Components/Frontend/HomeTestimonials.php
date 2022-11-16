<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;

class HomeTestimonials extends Component
{
    public $reviews;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($reviews)
    {
        $this->reviews = $reviews;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.home-testimonials');
    }
}
