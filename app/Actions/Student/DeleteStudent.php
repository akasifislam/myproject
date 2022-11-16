<?php

namespace App\Actions\Student;

use App\Actions\File\FileDelete;

class DeleteStudent
{
    public static function delete($student)
    {
        $studentImage = file_exists($student->image);

        if ($studentImage && $student->image != 'backend/image/default.png') {
            FileDelete::delete($student->image);
        }

        return $student->delete();
    }
}
