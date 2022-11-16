<?php

namespace App\Actions\Student;

use App\Actions\File\FileUpload;
use App\Models\User;

class CreateStudent
{
    public static function create($request)
    {
        $student = User::create($request->except(['image']));

        $image = $request->image;
        if ($image) {
            $url = FileUpload::upload($image, 'student');
            $student->update(['image' => $url]);
        }

        return $student;
    }
}
