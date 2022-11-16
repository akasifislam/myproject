<?php

namespace App\View\Components\Coursedescription;

use Illuminate\View\Component;

class Curriculum extends Component
{
    public $courseDetails;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($courseDetails)
    {
        $this->courseDetails = $courseDetails;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.coursedescription.curriculum');
    }
}
