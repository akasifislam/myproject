<?php

namespace App\Actions\Instructor;

use App\Actions\File\FileUpload;
use App\Models\Instructor;

class CreateInstructor
{
    public static function create($request)
    {
        $instructor = Instructor::create($request->except(['image']));

        $instructor->update(['status' => true]);
        $image = $request->image;
        if ($image) {
            $url = FileUpload::upload($image, 'instructor');
            $instructor->update(['image' => $url]);
        }

        return $instructor;
    }
}
