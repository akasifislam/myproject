<?php

namespace App\View\Components\Coursedescription;

use Illuminate\View\Component;

class InstructorDetails extends Component
{
    public $course, $totalcourses, $avgStar;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course, $totalcourses, $avgStar)
    {
        $this->course = $course;
        $this->totalcourses = $totalcourses;
        $this->avgStar = $avgStar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.coursedescription.instructor-details');
    }
}
