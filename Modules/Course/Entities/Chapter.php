<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'name', 'slug', 'order'];

    protected static function newFactory()
    {
        return \Modules\Course\Database\factories\ChapterFactory::new();
    }

    /**
     * Set the chapter slug.
     *
     * @param  string  $value
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->name);
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}
