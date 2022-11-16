<?php

namespace App\Models;

use Illuminate\Support\Str;
use Modules\Course\Entities\Course;
use Illuminate\Notifications\Notifiable;
use Modules\Instructor\Entities\InstructorEducation;
use Modules\Instructor\Entities\InstructorExperience;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\InstructorPasswordResetNotification;
use Modules\Event\Entities\Event;

class Instructor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "instructors";
    protected $guard = 'instructor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set the student slug.
     *
     * @param  string  $value
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->firstname . '-' . $item->lastname);
        });
    }

    public function education()
    {
        return $this->hasMany(InstructorEducation::class, 'instructor_id');
    }

    public function experience()
    {
        return $this->hasMany(InstructorExperience::class, 'instructor_id');
    }

    public function course()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new InstructorPasswordResetNotification($token));
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_instructors', 'instructor_id', 'event_id');
    }
}
