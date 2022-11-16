<?php

namespace App\Actions\Admin;

use App\Actions\File\FileDelete;
use App\Actions\File\FileUpload;

class UpdateAdmin
{
    public static function update($request, $admin)
    {
        $admin->update($request->except('image'));

        $image = $request->image;
        if ($image) {
            $adminImage = file_exists($admin->image);

            if ($adminImage && $admin->image != 'backend/image/default.png') {
                FileDelete::delete($admin->image);
            }

            $url = FileUpload::upload($image, 'admin');
            $admin->update(['image' => $url]);
        }

        return $admin;
    }
}
