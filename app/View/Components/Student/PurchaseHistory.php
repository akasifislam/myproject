<?php

namespace App\View\Components\Student;

use Illuminate\View\Component;

class PurchaseHistory extends Component
{
    public $orders;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.student.purchase-history');
    }
}
