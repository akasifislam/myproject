<?php

namespace App\Actions\Blog;

use App\Actions\File\FileUpload;
use Modules\Blog\Entities\Post;

class CreatePost
{
    public static function create($request)
    {
        $post = Post::create($request->except(['image', 'tags']));

        $image = $request->image;
        if ($image) {
            $url = FileUpload::upload($image, 'blog/post');
            $post->update(['image' => $url]);
        }

        $post->tags()->attach($request->tags);
        return $post;
    }
}
