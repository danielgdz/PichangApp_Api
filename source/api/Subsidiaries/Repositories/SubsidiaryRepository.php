<?php

namespace Api\Subsidiaries\Repositories;

use Api\Subsidiaries\Models\Subsidiary;
use Infrastructure\Database\Eloquent\Repository;
//EXTERNAL MODELS
use Api\Companies\Models\Company;
//EXTERNAL MODELS
use DB;
use Schema;

class SubsidiaryRepository extends Repository
{
    public function getModel()
    {
        return new Subsidiary();
    }
    
    public function getByCompanyId($companyId, $options)
    {
        $subsidiary = $this->getModel();
        $list = $subsidiary::join(Company::TABLE_NAME, Company::TABLE_NAME . '.id', '=',
                        Subsidiary::TABLE_NAME . '.com_companies_id')
                    ->select(DB::raw(Company::TABLE_NAME . '.name as company_name'),
                        Subsidiary::TABLE_NAME . '.*')
                    ->whereNull(Subsidiary::TABLE_NAME . '.deleted_at')
                    ->where(Subsidiary::TABLE_NAME . '.com_companies_id', (int)$companyId);
        
        $this->applyResourceOptions($list, $options);
        if (empty($options['sort'])) {
            $this->defaultSort($list, $options);
        }

        return $list;
    } 

    public function create(array $data)
    {
        $subsidiary = $this->getModel();
        DB::beginTransaction();
        try {
            $subsidiary->fill($data);
            $subsidiary->save();
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $subsidiary;
    }

    public function update(Subsidiary $subsidiary, array $data)
    {
        DB::beginTransaction();
        try {
            $subsidiary->fill($data);
            $subsidiary->save();
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $subsidiary;
    }

    public function entityValues()
    {
        return  ['*'];
    }    
}
