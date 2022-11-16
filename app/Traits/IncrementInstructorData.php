<?php

namespace App\Traits;

use App\Models\Instructor;
use Modules\Course\Entities\Course;

trait IncrementInstructorData
{
    public function totalEnrolledIncrement($course_id)
    {
        $course = Course::findOrFail($course_id);
        Instructor::findOrFail($course->instructor_id)->increment('total_enrolled');
    }
}
