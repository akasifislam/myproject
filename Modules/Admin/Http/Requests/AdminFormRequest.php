<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFormRequest extends FormRequest
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
                'email' => 'required|unique:admins,email',
                'password' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg'
            ];
        } else {
            return [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => "required|unique:admins,email,{$this->admin->id}",
                'image' => 'image|mimes:png,jpg,jpeg'
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
