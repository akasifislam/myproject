<?php

namespace App\Actions\Admin;

use App\Models\Admin;
use App\Actions\File\FileUpload;

class CreateAdmin
{
    public static function create($request)
    {
        $admin = Admin::create($request->except(['image']));

        $image = $request->image;
        if ($image) {
            $url = FileUpload::upload($image, 'admin');
            $admin->update(['image' => $url]);
        }

        return $admin;
    }
}
