<?php

namespace Api\Subsidiaries\Controllers;

use Illuminate\Http\Request;
use Infrastructure\Http\Controller;
use Api\Subsidiaries\Requests\CreateSubsidiaryRequest;
use Api\Subsidiaries\Services\SubsidiaryService;

class SubsidiaryController extends Controller
{
    private $subsidiaryService;

    public function __construct(SubsidiaryService $subsidiaryService)
    {
        $this->subsidiaryService = $subsidiaryService;
    }

    public function getAll()
    {
        $resourceOptions = $this->parseResourceOptions();

        $data = $this->subsidiaryService->getAll($resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function getByCompanyId($companyId)
    {
        $resourceOptions = $this->parseResourceOptions();

        $data = $this->subsidiaryService->getByCompanyId($companyId, $resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function getById($subsidiaryId)
    {
        $resourceOptions = $this->parseResourceOptions();

        $data = $this->subsidiaryService->getById($subsidiaryId, $resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function create(CreateSubsidiaryRequest $request)
    {
        $data = $request->all();
        if (isset($data['id'])) {
            return $this->response($this->subsidiaryService->update((int)$data['id'], $data));
        } else {
            return $this->response($this->subsidiaryService->create($request->all()), 201);
        }
    }

    public function update($subsidiaryId, Request $request)
    {
        return $this->response($this->subsidiaryService->update($subsidiaryId, $request->all()));
    }

    public function delete($subsidiaryId)
    {
        return $this->response($this->subsidiaryService->delete($subsidiaryId));
    }
}
