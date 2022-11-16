<?php

namespace App\Actions\Course;

use App\Actions\File\FileUpload;
use Modules\Course\Entities\Course;

class CreateCourse
{
    public static function create($request)
    {
        $course = Course::create($request->except(['thumbnail']));

        $thumbnail = $request->thumbnail;
        if ($thumbnail) {
            $url = FileUpload::upload($thumbnail, 'course');
            $course->update(['thumbnail' => $url]);
        }

        return $course;
    }
}
