<?php

namespace Api\Subsidiaries\Services;

use Exception;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\DatabaseManager;
use Illuminate\Events\Dispatcher;
use Api\Subsidiaries\Exceptions\SubsidiaryNotFoundException;
use Api\Subsidiaries\Events\SubsidiaryWasCreated;
use Api\Subsidiaries\Events\SubsidiaryWasDeleted;
use Api\Subsidiaries\Events\SubsidiaryWasUpdated;
use Api\Subsidiaries\Repositories\SubsidiaryRepository;

class SubsidiaryService
{
    private $auth;

    private $database;

    private $dispatcher;

    private $subsidiaryRepository;

    public function __construct(
        AuthManager $auth,
        DatabaseManager $database,
        Dispatcher $dispatcher,
        SubsidiaryRepository $subsidiaryRepository
    ) {
        $this->auth = $auth;
        $this->database = $database;
        $this->dispatcher = $dispatcher;
        $this->subsidiaryRepository = $subsidiaryRepository;
    }

    public function getAll($options = [])
    {
        //IN THIS CASE, SUBSIDIARY HAVE A POINT DB VALUE, 
        //SO WE NEED TO EXECUTE AND EXTRA CODE WITH THE QUERYBUILDER
        $query = $this->subsidiaryRepository->getQuery($options);
        return $query->get();
    }

    public function getByCompanyId($companyId, $options = [])
    {
        $query = $this->subsidiaryRepository->getByCompanyId($companyId, $options);
        return $query->get();
    }

    public function getById($subsidiaryId, array $options = [])
    {
        $subsidiary = $this->getRequestedSubsidiary($subsidiaryId);
        return $subsidiary;
    }

    public function create($data)
    {
        $subsidiary = $this->subsidiaryRepository->create($data);
        $this->dispatcher->fire(new SubsidiaryWasCreated($subsidiary));
        return $subsidiary;
    }

    public function update($subsidiaryId, array $data)
    {
        $subsidiary = $this->getRequestedSubsidiary($subsidiaryId);
        $this->subsidiaryRepository->update($subsidiary, $data);
        $this->dispatcher->fire(new SubsidiaryWasUpdated($subsidiary));
        return $subsidiary;
    }

    public function delete($subsidiaryId)
    {
        $subsidiary = $this->getRequestedSubsidiary($subsidiaryId);
        $this->subsidiaryRepository->smartDelete($subsidiary);
        $this->dispatcher->fire(new SubsidiaryWasDeleted($subsidiary));
    }

    private function getRequestedSubsidiary($subsidiaryId)
    {
        $subsidiary = $this->subsidiaryRepository->getById($subsidiaryId);
        if (is_null($subsidiary)) {
            throw new SubsidiaryNotFoundException();
        }
        return $subsidiary;
    }
}
