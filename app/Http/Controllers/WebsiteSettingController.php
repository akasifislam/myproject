<?php

namespace App\Http\Controllers;

use App\Actions\Setting\UpdateSetting;
use App\Http\Requests\WebsiteSettingsFormRequest;
use App\Models\WebsiteSettings;

class WebsiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $settings = WebsiteSettings::get();
        return view('backend.websiteSettings.index', compact('settings'));
    }

    public function update(WebsiteSettingsFormRequest $request, WebsiteSettings $setting)
    {
        try {
            $settings = UpdateSetting::update($request, $setting);
            if ($settings) {
                flashSuccess('Website Settings Updated Successfully');
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
