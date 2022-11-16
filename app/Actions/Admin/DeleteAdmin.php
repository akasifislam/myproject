<?php

namespace App\Actions\Admin;

use App\Actions\File\FileDelete;

class DeleteAdmin
{
    public static function delete($admin)
    {
        $adminImage = file_exists($admin->image);

        if ($adminImage && $admin->image != 'backend/image/default.png') {
            FileDelete::delete($admin->image);
        }

        return $admin->delete();
    }
}
