<?php

namespace App\Traits;

use App\Models\BookedSeat;
use Illuminate\Http\Request;
use Modules\Event\Entities\Event;
use Modules\Student\Entities\Student;

trait IncrementBookedSeat
{
    public function IncrementBookedSeat($event_id)
    {
        $event = Event::findOrFail($event_id);
        Event::findOrFail($event->id)->increment('booked_seat');
    }

    protected function validation(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
    }
}
