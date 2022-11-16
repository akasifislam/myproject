<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() === 'POST') {
            return [
                'name' => "required|unique:categories,name",
                'icon' => "required",
                'thumbnail' => "required|image|max:3072|mimes:jpeg,png,jpg",
            ];
        } else {
            return [
                'name' => "required|unique:categories,name,{$this->category->id}",
                'icon' => "required",
                'thumbnail' => "image|max:3072|mimes:jpeg,png,jpg",
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
