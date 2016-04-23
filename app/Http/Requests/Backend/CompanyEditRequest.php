<?php

namespace App\Http\Requests\Backend;

class CompanyEditRequest extends BackendRequest
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
            "slug" => "required|unique:companies,slug,".$this->get('id'),
            "image" => "image|max:5000",
            "email" => "email",
            "website" => "url",
            "facebook" => "url",
            "twitter" => "url",
            "google" => "url",
            "town_id" => "required|exists:towns,id",
            "is_brand" => "boolean",
            "is_active" => "boolean",
            "sector_id" => "required|exists:sectors,id"
        ];
    }
}
