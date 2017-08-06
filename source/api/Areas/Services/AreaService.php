<?php

namespace Api\Areas\Services;

use Exception;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\DatabaseManager;
use Illuminate\Events\Dispatcher;
use Api\Areas\Exceptions\AreaNotFoundException;
use Api\Areas\Events\AreaWasCreated;
use Api\Areas\Events\AreaWasDeleted;
use Api\Areas\Events\AreaWasUpdated;
use Api\Areas\Repositories\AreaRepository;

class AreaService
{
    private $auth;

    private $database;

    private $dispatcher;

    private $areaRepository;

    public function __construct(
        AuthManager $auth,
        DatabaseManager $database,
        Dispatcher $dispatcher,
        AreaRepository $areaRepository
    ) {
        $this->auth = $auth;
        $this->database = $database;
        $this->dispatcher = $dispatcher;
        $this->areaRepository = $areaRepository;
    }

    public function getAll($options = [])
    {
        return $this->areaRepository->get($options);
    }

    public function getById($areaId, array $options = [])
    {
        $area = $this->getRequestedArea($areaId);
        return $area;
    }

    public function create($data)
    {
        $area = $this->areaRepository->create($data);
        $this->dispatcher->fire(new AreaWasCreated($area));
        return $area;
    }

    public function update($areaId, array $data)
    {
        $area = $this->getRequestedArea($areaId);
        $this->areaRepository->update($area, $data);
        $this->dispatcher->fire(new AreaWasUpdated($area));
        return $area;
    }

    public function delete($areaId)
    {
        $area = $this->getRequestedArea($areaId);
        $this->areaRepository->smartDelete($area);
        $this->dispatcher->fire(new AreaWasDeleted($area));
    }

    private function getRequestedArea($areaId)
    {
        $area = $this->areaRepository->getById($areaId);
        if (is_null($area)) {
            throw new AreaNotFoundException();
        }
        return $area;
    }
}
