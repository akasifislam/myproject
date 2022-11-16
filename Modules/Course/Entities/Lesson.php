<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Course\Database\factories\LessonFactory::new();
    }

    /**
     * Set the course slug.
     *
     * @param  string  $value
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->lesson_name);
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }

    public function lessonActivityCheck($course_id, $chapter_id, $lesson_id)
    {
        return CourseProgress::where('course_id', $course_id)
            ->where('chapter_id', $chapter_id)
            ->where('lesson_id', $lesson_id)
            ->where('student_id', auth()->user()->id)
            ->count();
    }
}
