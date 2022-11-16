<?php

namespace App\Actions\Course;

use App\Actions\File\FileDelete;

class DeleteCourse
{
    public static function delete($course)
    {
        $courseImage = file_exists($course->thumbnail);

        if ($courseImage) {
            FileDelete::delete($course->thumbnail);
        }

        return $course->delete();
    }
}
