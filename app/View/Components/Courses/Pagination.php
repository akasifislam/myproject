<?php

namespace App\View\Components\Courses;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $courses;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($courses)
    {
        $this->courses = $courses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.courses.pagination');
    }
}
