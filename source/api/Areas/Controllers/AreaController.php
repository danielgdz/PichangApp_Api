<?php

namespace Api\Areas\Controllers;

use Illuminate\Http\Request;
use Infrastructure\Http\Controller;
use Api\Areas\Requests\CreateAreaRequest;
use Api\Areas\Services\AreaService;

class AreaController extends Controller
{
    private $areaService;

    public function __construct(AreaService $areaService)
    {
        $this->areaService = $areaService;
    }

    public function getAll()
    {
        $resourceOptions = $this->parseResourceOptions();

        $data = $this->areaService->getAll($resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function getById($areaId)
    {
        $resourceOptions = $this->parseResourceOptions();

        $data = $this->areaService->getById($areaId, $resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function create(CreateAreaRequest $request)
    {
        return $this->response($this->areaService->create($request->all()), 201);
    }

    public function update($areaId, Request $request)
    {
        return $this->response($this->areaService->update($areaId, $request->all()));
    }

    public function delete($areaId)
    {
        return $this->response($this->areaService->delete($areaId));
    }
}
