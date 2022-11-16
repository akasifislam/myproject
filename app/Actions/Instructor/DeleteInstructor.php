<?php

namespace App\Actions\Instructor;

use App\Actions\File\FileDelete;

class DeleteInstructor
{
    public static function delete($instructor)
    {
        $instructorImage = file_exists($instructor->image);

        if ($instructorImage && $instructor->image != 'backend/image/default.png') {
            FileDelete::delete($instructor->image);
        }

        return $instructor->delete();
    }
}
