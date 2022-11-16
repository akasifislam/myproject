<?php

namespace Modules\Event\Entities;

use App\Models\BookedSeat;
use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Event\Database\factories\EventFactory::new();
    }

    /**
     * Set the event slug.
     *
     * @param  string  $value
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->title);
        });
    }

    public function seatBooked($eventid)
    {
        $seatCount = BookedSeat::where([['event_id', $eventid], ['student_id', auth()->user()->id]])->count();

        if ($seatCount >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'event_instructors', 'event_id', 'instructor_id');
    }
}
