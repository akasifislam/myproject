<?php

namespace Modules\Event\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'POST') {
            if ($this->event_type == 'Paid') {
                return [
                    'title' => "required|unique:events,title",
                    'category_id' => "required",
                    'date' => "required",
                    'price' => "required",
                    'country' => "required",
                    'city' => "required",
                    'event_type' => "required",
                    'starting_time' => "required",
                    'ending_time' => "required",
                    'address' => "required",
                    'description' => "required",
                    'total_seat' => "required",
                    'speakers' => "required",
                    'thumbnail' => "image|mimes:png,jpg,jpeg"
                ];
            } else {
                return [
                    'title' => "required|unique:events,title",
                    'category_id' => "required",
                    'date' => "required",
                    'country' => "required",
                    'city' => "required",
                    'event_type' => "required",
                    'starting_time' => "required",
                    'ending_time' => "required",
                    'address' => "required",
                    'description' => "required",
                    'total_seat' => "required",
                    'speakers' => "required",
                    'thumbnail' => "image|mimes:png,jpg,jpeg"
                ];
            }
        } else {
            if ($this->event_type == 'Paid') {
                return [
                    'title' => "required",
                    'date' => "required",
                    'price' => "required",
                    'country' => "required",
                    'city' => "required",
                    'event_type' => "required",
                    'starting_time' => "required",
                    'ending_time' => "required",
                    'address' => "required",
                    'description' => "required",
                    'total_seat' => "required",
                    'speakers' => "required",
                    'thumbnail' => "image|mimes:png,jpg,jpeg"
                ];
            } else {
                return [
                    'title' => "required",
                    'date' => "required",
                    'country' => "required",
                    'city' => "required",
                    'event_type' => "required",
                    'starting_time' => "required",
                    'ending_time' => "required",
                    'address' => "required",
                    'description' => "required",
                    'total_seat' => "required",
                    'speakers' => "required",
                    'thumbnail' => "image|mimes:png,jpg,jpeg"
                ];
            }
        }
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The category field is required'
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
