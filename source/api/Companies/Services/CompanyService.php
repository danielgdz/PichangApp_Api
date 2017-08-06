<?php

namespace Api\Companies\Services;

use Exception;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\DatabaseManager;
use Illuminate\Events\Dispatcher;
use Api\Companies\Exceptions\CompanyNotFoundException;
use Api\Companies\Events\CompanyWasCreated;
use Api\Companies\Events\CompanyWasDeleted;
use Api\Companies\Events\CompanyWasUpdated;
use Api\Companies\Repositories\CompanyRepository;

class CompanyService
{
    private $auth;

    private $database;

    private $dispatcher;

    private $companyRepository;

    public function __construct(
        AuthManager $auth,
        DatabaseManager $database,
        Dispatcher $dispatcher,
        CompanyRepository $companyRepository
    ) {
        $this->auth = $auth;
        $this->database = $database;
        $this->dispatcher = $dispatcher;
        $this->companyRepository = $companyRepository;
    }

    public function getAll($options = [])
    {
        return $this->companyRepository->get($options);
    }

    public function getGlobalQuantity($options = [])
    {
        return $this->companyRepository->quantityEntity($options);
    }

    public function getAll360($options = [])
    {
        $query = $this->companyRepository->getQuery($options);
        return $query->get($this->companyRepository->entityValues());
    }

    public function getById($companyId, array $options = [])
    {
        $company = $this->getRequestedCompany($companyId);
        return $company;
    }

    public function getByAppId($appId, array $options = [])
    {
        $query = $this->companyRepository->getQueryByAppId($appId, $options);
        return $query;
    }

    public function create($data)
    {
        $company = $this->companyRepository->create($data);
        $this->dispatcher->fire(new CompanyWasCreated($company));
        return $company;
    }

    public function update($companyId, array $data)
    {
        $company = $this->getRequestedCompany($companyId);
        $this->companyRepository->update($company, $data);
        $this->dispatcher->fire(new CompanyWasUpdated($company));
        return $company;
    }

    public function delete($companyId)
    {
        $company = $this->getRequestedCompany($companyId);
        $this->companyRepository->smartDelete($company);
        $this->dispatcher->fire(new CompanyWasDeleted($company));
    }

    private function getRequestedCompany($companyId)
    {
        $company = $this->companyRepository->getById($companyId);
        if (is_null($company)) {
            throw new CompanyNotFoundException();
        }
        return $company;
    }
}
