<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteSettingsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validatedImage = 'image|mimes:jpg,png,jpeg,svg';
        return [
            'name' => "required",
            'email' => "required",
            'phone' => "required",
            'address' => "required",
            'instagram_link' => "nullable|url",
            'linkedin_link' => "nullable|url",
            'twitter_link' => "nullable|url",
            'youtube_link' => "nullable|url",
            'fb_link' => "nullable|url",
            'favicon_image' => $validatedImage,
            'header_logo' => $validatedImage,
            'footer_logo' => $validatedImage,
        ];
    }
}
