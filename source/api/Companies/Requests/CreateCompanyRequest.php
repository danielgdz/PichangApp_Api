<?php

namespace Api\Companies\Requests;

use Infrastructure\Http\ApiRequest;

class CreateCompanyRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'the company name'
        ];
    }
}
