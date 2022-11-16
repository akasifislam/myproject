<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'header_logo',
        'footer_logo',
        'favicon_image',
    ];

    public static function websiteSetting()
    {
        return WebsiteSettings::first();
    }
}
