<?php

namespace App\Http\Requests\Backend;

class NewsCreateRequest extends BackendRequest
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
        return [
            "name" => "required",
            "slug" => "required|unique:news",
            "image" => "image|max:5000",
        ];
    }
}
