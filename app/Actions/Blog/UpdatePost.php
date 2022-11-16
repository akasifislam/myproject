<?php

namespace App\Actions\Blog;

use App\Actions\File\FileUpload;

class UpdatePost
{
    public static function update($request, $team)
    {
        $team->update($request->all());

        $image = $request->image;
        if ($image) {
            $url = FileUpload::upload($image, 'team');
            $team->update(['image' => $url]);
        }

        return $team;
    }
}
