<?php

namespace App\View\Components\Coursedescription;

use Illuminate\View\Component;

class Review extends Component
{
    public $courseDetails, $reviews, $starsCounts, $starsPercentages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($courseDetails, $reviews, $starsCounts, $starsPercentages)
    {
        $this->courseDetails = $courseDetails;
        $this->reviews = $reviews;
        $this->starsCounts = $starsCounts;
        $this->starsPercentages = $starsPercentages;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.coursedescription.review');
    }
}
