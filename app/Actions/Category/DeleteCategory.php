<?php

namespace App\Actions\Category;

use App\Actions\File\FileDelete;

class DeleteCategory
{
    public static function delete($category)
    {
        $categoryImage = file_exists($category->image);

        if($categoryImage){
            FileDelete::delete($category->image);
        }

        return $category->delete();
    }
}
