<?php

namespace App\Actions\Student;

use App\Actions\File\FileDelete;
use App\Actions\File\FileUpload;

class UpdateStudent
{
    public static function update($request, $student)
    {
        $student->update($request->except('image'));

        $image = $request->image;
        if ($image) {
            $studentImage = file_exists($student->image);

            if ($studentImage && $student->image != 'backend/image/default.png') {
                FileDelete::delete($student->image);
            }

            $url = FileUpload::upload($image, 'student');
            $student->update(['image' => $url]);
        }

        return $student;
    }
}
