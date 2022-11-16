<?php

namespace App\Models;

use Modules\Student\Entities\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Event\Entities\Event;

class BookedSeat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
