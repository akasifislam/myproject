<?php

namespace App\Actions\Course;

use App\Actions\File\FileUpload;

class UpdateCourse
{
    public static function update($request, $course)
    {
        $course->update($request->except('thumbnail'));

        $thumbnail = $request->thumbnail;
        if ($thumbnail) {
            $url = FileUpload::upload($thumbnail, 'course');
            $course->update(['thumbnail' => $url]);
        }

        return $course;
    }
}
