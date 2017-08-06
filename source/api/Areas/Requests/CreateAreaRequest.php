<?php

namespace Api\Areas\Requests;

use Infrastructure\Http\ApiRequest;

class CreateAreaRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'the area name'
        ];
    }
}
