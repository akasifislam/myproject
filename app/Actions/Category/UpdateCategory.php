<?php

namespace App\Actions\Category;

use App\Actions\File\FileUpload;

class UpdateCategory
{
    public static function update($request, $category)
    {
        $category->update($request->except('thumbnail'));

        $thumbnail = $request->thumbnail;
        if ($thumbnail) {
            $url = FileUpload::upload($thumbnail, 'category');
            $category->update(['thumbnail' => $url]);
        }













        // if($request->file != ''){

        //     $thumbnail = $request->thumbnail;
        //     if ($thumbnail) {
        //         $url = FileUpload::upload($thumbnail, 'category');
        //         $category->update(['thumbnail' => $url]);
        //     }

        // }





        // if($request->thumbnail){

        //     $thumbnail = $request->thumbnail;
        //     $url = FileUpload::upload($thumbnail, 'category');
        //     $category->update(['thumbnail' => $url]);
        // };

        return $category;
    }
}
