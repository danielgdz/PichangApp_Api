<?php

namespace Api\Companies\Repositories;

use Api\Companies\Models\Company;
use Infrastructure\Database\Eloquent\Repository;
use DB;
use Schema;

//EXTERNAL MODELS
use Api\Polls\Models\Poll;
use Api\Employees\Models\Employee;

class CompanyRepository extends Repository
{
    public function getModel()
    {
        return new Company();
    }

    public function create(array $data)
    {
        $company = $this->getModel();
        DB::beginTransaction();
        try {
            if (!isset($data['date_healing'])) {
                $data['date_healing'] = date("Y-m-d");
            }
            $company->fill($data);
            $company->save();
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $company;
    }

    public function update(Company $company, array $data)
    {
        DB::beginTransaction();
        try {
            $company->fill($data);
            $company->save();
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $company;
    }

    public function getQueryByAppId($appId, array $options)
    {
        $query = $this->model->select(Company::TABLE_NAME . '.*')
                    ->whereNull(Company::TABLE_NAME . '.deleted_at')
                    ->where(Company::TABLE_NAME . '.app_id', (int)$appId);

        $this->applyResourceOptions($query, $options);
        if (empty($options['sort'])) {
            $this->defaultSort($query, $options);
        }
        $query = $query->get();
        return $query;
    }

    public function entityValues()
    {
        return  [
                    '*',                    
                    DB::raw('0 as polls_number'), 
                    DB::raw('0 as employees_number'), 
                    DB::raw('0 as process_number')
                ];
    }  
}
