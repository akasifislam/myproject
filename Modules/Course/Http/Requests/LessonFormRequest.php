<?php

namespace Modules\Course\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'POST') {
            if ($this->video_type == 'file') {
                return [
                    'lesson_name' => 'required|unique:lessons,lesson_name',
                    'course_id' => 'required',
                    'chapter_id' => 'required',
                    'duration' => 'required|numeric',
                    'video_type' => 'required',
                ];
            } else {
                return [
                    'lesson_name' => 'required|unique:lessons,lesson_name',
                    'course_id' => 'required',
                    'chapter_id' => 'required',
                    'duration' => 'required|numeric',
                    'video_type' => 'required',
                    'video_url' => 'required|url',
                ];
            }
        } else {
            if ($this->video_type == 'file') {
                return [
                    'lesson_name' => "required|unique:lessons,lesson_name,{$this->lesson->id}",
                    'course_id' => 'required',
                    'chapter_id' => 'required',
                    'duration' => 'required|numeric',
                    'video_type' => 'required',
                ];
            } else {
                return [
                    'lesson_name' => "required|unique:lessons,lesson_name,{$this->lesson->id}",
                    'course_id' => 'required',
                    'chapter_id' => 'required',
                    'duration' => 'required|numeric',
                    'video_type' => 'required',
                    'video_url' => 'required|url',
                ];
            }
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
