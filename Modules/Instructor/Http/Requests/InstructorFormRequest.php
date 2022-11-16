<?php

namespace Modules\Instructor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == "POST") {
            return [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|unique:instructors,email',
                'password' => 'required',
                'gender' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg',
                'fb_link' => 'url|nullable',
                'twitter_link' => 'url|nullable',
                'instagram_link' => 'url|nullable',
                'youtube_link' => 'url|nullable',
                'linkedin_link' => 'url|nullable',
            ];
        } else {
            return [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => "required|unique:instructors,email,{$this->instructor->id}",
                'gender' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg',
                'fb_link' => 'url|nullable',
                'twitter_link' => 'url|nullable',
                'instagram_link' => 'url|nullable',
                'youtube_link' => 'url|nullable',
                'linkedin_link' => 'url|nullable',
            ];
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
