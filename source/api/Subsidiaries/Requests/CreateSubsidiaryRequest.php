<?php

namespace Api\Subsidiaries\Requests;

use Infrastructure\Http\ApiRequest;

class CreateSubsidiaryRequest extends ApiRequest
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
            'name' => 'the subsidiary name'
        ];
    }
}
