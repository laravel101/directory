<?php

namespace App\Http\Requests\Backend;

class UserEditRequest extends BackendRequest
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
            "name"     => "required",
            "email"    => "required|unique:users,email,".$this->get("id"),
            "username" => "required|unique:users,username,".$this->get('id')."|min:3",
            "password" => "min:6|confirmed",
            "is_admin" => "boolean"
        ];
    }
}
