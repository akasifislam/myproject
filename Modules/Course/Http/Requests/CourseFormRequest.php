<?php

namespace Modules\Course\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->course_type == 'paid') {
            return [
                'title' => 'required|unique:courses,title',
                'category_id' => 'required',
                'instructor_id' => 'required',
                'duration' => 'required|numeric',
                'level' => 'required',
                'price' => 'required',
                'course_type' => 'required',
                'video_type' => 'required',
                'video_url' => 'required|url',
                'status' => 'required',
            ];
        } else {
            return [
                'title' => 'required|unique:courses,title',
                'category_id' => 'required',
                'instructor_id' => 'required',
                'duration' => 'required|numeric',
                'level' => 'required',
                'course_type' => 'required',
                'video_type' => 'required',
                'video_url' => 'required|url',
                'status' => 'required',
            ];
        }
    }
    /**
     * Get the messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.required' => 'The category field is required.',
        ];
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
