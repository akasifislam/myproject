<?php

namespace Modules\Review\Entities;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Entities\Course;
use Modules\Student\Entities\Student;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Review\Database\factories\ReviewFactory::new();
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function student_reviews()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function course_reviews()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
