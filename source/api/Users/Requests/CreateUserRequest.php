<?php

namespace Api\Users\Requests;

use Infrastructure\Http\ApiRequest;

class CreateUserRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required|string|min:8'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'the user\'s name',
            'email' => 'the user\'s email',
            'password' => 'the user\'s password',
        ];
    }
}
