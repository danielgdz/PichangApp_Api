<?php

namespace Api\Users\Requests;

use Infrastructure\Http\ApiRequest;

class LoginUserRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'the user\'s email',
            'password' => 'the user\'s password',
        ];
    }
}
