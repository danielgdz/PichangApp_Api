<?php

namespace Api\Companies\Controllers;

use Illuminate\Http\Request;
use Infrastructure\Http\Controller;
use Api\Companies\Requests\CreateCompanyRequest;
use Api\Companies\Services\CompanyService;

class CompanyController extends Controller
{
    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function getGlobalQuantity($parsedData, array $resourceOptions)
    {
        if (isset($resourceOptions['limit'])) {
            $resourceOptions['limit'] = null;
            $resourceOptions['page'] = null;
            $quantity = $this->companyService->getGlobalQuantity($resourceOptions);
            $parsedData_ = $parsedData;
            $parsedData = array();
            $parsedData['data'] = $parsedData_;
            $parsedData['global_quantity'] = $quantity;
        }
        return $parsedData;
    }

    public function getAll()
    {
        $resourceOptions = $this->parseResourceOptions();
        $data = $this->companyService->getAll360($resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions);
        $responseData = $this->getGlobalQuantity($parsedData, $resourceOptions);
        return $this->response($responseData);
    }

    public function getById($companyId)
    {
        $resourceOptions = $this->parseResourceOptions();

        $data = $this->companyService->getById($companyId, $resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function getByAppId($appId, Request $request)
    {
        $resourceOptions = $this->parseResourceOptions();

        $data = $this->companyService->getByAppId($appId, $resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function create(CreateCompanyRequest $request)
    {
        return $this->response($this->companyService->create($request->all()), 201);
    }

    public function update($companyId, Request $request)
    {
        return $this->response($this->companyService->update($companyId, $request->all()));
    }

    public function delete($companyId)
    {
        return $this->response($this->companyService->delete($companyId));
    }
}
