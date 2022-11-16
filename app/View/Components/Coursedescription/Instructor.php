<?php

namespace App\View\Components\Coursedescription;

use Illuminate\View\Component;

class Instructor extends Component
{
    public $avgStar, $courseDetails, $instructorTotalCourses;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($avgStar, $courseDetails, $instructorTotalCourses)
    {
        $this->avgStar = $avgStar;
        $this->courseDetails = $courseDetails;
        $this->instructorTotalCourses = $instructorTotalCourses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.coursedescription.instructor');
    }
}
