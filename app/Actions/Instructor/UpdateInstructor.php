<?php

namespace App\Actions\Instructor;

use App\Actions\File\FileDelete;
use App\Actions\File\FileUpload;

class UpdateInstructor
{
    public static function update($request, $instructor)
    {
        $instructor->update($request->except('image'));

        $image = $request->image;
        if ($image) {
            $instructorImage = file_exists($instructor->image);

            if ($instructorImage && $instructor->image != 'backend/image/default.png') {
                FileDelete::delete($instructor->image);
            }

            $url = FileUpload::upload($image, 'instructor');
            $instructor->update(['image' => $url]);
        }

        return $instructor;
    }
}
