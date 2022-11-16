<?php

namespace Modules\Instructor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorExperienceFormRequest extends FormRequest
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
                'instructor_id' => "required",
                'name' => "required|unique:instructor_experiences,name",
                'year' => "required",
                'description' => "required",
            ];
        } else {
            return [
                'instructor_id' => "required",
                'name' => "required|unique:instructor_experiences,name,{$this->experience->id}",
                'year' => "required",
                'description' => "required",
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
