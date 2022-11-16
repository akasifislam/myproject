<?php

namespace App\Actions\Blog;

use App\Actions\File\FileDelete;

class DeletePost
{
    public static function delete($post)
    {
        $image = file_exists($post->image);

        if($image){
            FileDelete::delete($post->image);
        }

        return $post->delete();
    }
}
