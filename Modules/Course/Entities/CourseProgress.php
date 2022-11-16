<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'chapter_id',
        'lesson_id',
        'student_id',
        'status'
    ];

    protected static function newFactory()
    {
        return \Modules\Course\Database\factories\CourseProgressFactory::new();
    }
}
