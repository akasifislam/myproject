<?php

namespace App\Actions\Category;

use App\Actions\File\FileUpload;
use Modules\Category\Entities\Category;

class CreateCategory
{
    public static function create($request)
    {
        $category = Category::create($request->except(['thumbnail']));

        $thumbnail = $request->thumbnail;
        if ($thumbnail) {
            $url = FileUpload::upload($thumbnail, 'category');
            $category->update(['thumbnail' => $url]);
        }

        return $category;
    }
}
