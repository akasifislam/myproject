<?php

namespace Modules\Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentFormRequest extends FormRequest
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
                'email' => 'required|unique:users,email',
                'password' => 'required',
            ];
        } else {
            return [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => "required|unique:users,email,{$this->student->id}",
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
