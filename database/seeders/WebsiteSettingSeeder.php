<?php

namespace Database\Seeders;

use App\Models\WebsiteSettings;
use Illuminate\Database\Seeder;

class WebsiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new WebsiteSettings();
        $setting->name = "Site Name";
        $setting->email = "example@mail.com";
        $setting->phone = "+1202-555-0621";
        $setting->address = "Street NO. #15, House NO. #15/B Chicago-60827, USA";
        $setting->instagram_link = "https://www.instagram.com/";
        $setting->linkedin_link = "https://www.linkedin.com/";
        $setting->twitter_link = "https://www.twitter.com/";
        $setting->youtube_link = "https://www.youtube.com/";
        $setting->fb_link = "https://www.facebook.com/";
        $setting->save();
    }
}
