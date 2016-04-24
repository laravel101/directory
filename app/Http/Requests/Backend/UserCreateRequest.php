<?php

namespace App\Http\Requests\Backend;

class UserCreateRequest extends BackendRequest
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
            "email"    => "required|unique:users",
            "username" => "required|unique:users|min:3",
            "password" => "required|min:6|confirmed",
            "is_admin" => "boolean"
        ];
    }
}
