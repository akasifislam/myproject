<?php

namespace App\View\Components\Coursedescription;

use Illuminate\View\Component;

class RelatedCourses extends Component
{
    public $relatedCourses;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($relatedCourses)
    {
        $this->relatedCourses = $relatedCourses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.coursedescription.related-courses');
    }
}
