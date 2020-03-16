<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
        $arrayOfUrl = explode('/', \Request::url());
        return [
            'username' => 'required|alpha|unique:users,username,'. end($arrayOfUrl) .',id_user',
            'email' => 'required|email:rfc,dns|unique:users,email,'. end($arrayOfUrl) .',id_user',
            'activity' => 'not_in:1000|numeric',
            'rolesDll' => 'not_in:1000|numeric',
            'id_user' => 'numeric'
        ];
    }
}
