<?php

namespace App\Actions\Setting;

use App\Actions\File\FileDelete;
use App\Actions\File\FileUpload;

class UpdateSetting
{
    public static function update($request, $setting)
    {
        $setting->update($request->except(['favicon_image', 'header_logo', 'footer_logo']));

        // favicon image
        $favicon_image = $request->favicon_image;
        if ($favicon_image) {
            if (file_exists($setting->favicon_image)) {
                FileDelete::delete($setting->favicon_image);
            }
            $url = FileUpload::upload($favicon_image, 'website');
            $setting->update(['favicon_image' => $url]);
        }

        // header logo
        $header_logo = $request->header_logo;
        if ($header_logo) {
            if (file_exists($setting->header_logo)) {
                FileDelete::delete($setting->header_logo);
            }
            $url = FileUpload::upload($header_logo, 'website');
            $setting->update(['header_logo' => $url]);
        }

        // footer logo
        $footer_logo = $request->footer_logo;
        if ($footer_logo) {
            if (file_exists($setting->footer_logo)) {
                FileDelete::delete($setting->footer_logo);
            }
            $url = FileUpload::upload($footer_logo, 'website');
            $setting->update(['footer_logo' => $url]);
        }

        return $setting;
    }
}
