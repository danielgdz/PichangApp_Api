<?php

namespace Infrastructure\Database\Eloquent;

use Optimus\Genie\Repository as BaseRepository;
use DB;

abstract class Repository extends BaseRepository
{
    /**
     * Function for return Base query builder
     * @param  array $options
     * @return Builder
     */
    public function getQuery(array $options = [])
    {
        return $this->createBaseBuilder($options);
    }

    /**
     * Extend the queryBuilder to only search deleted_at : null resources
     * @param  array $options
     * @return Builder
     */
    public function createQueryBuilder(array $options = [])
    {
        return $this->model->newQuery()->whereNull('deleted_at');
    }

    /**
     * Function for return global quantity of a query
     * @param  array $options
     * @return Builder
     */
    public function quantityEntity($options = [])
    {
        $query = $this->createBaseBuilder($options);
        return $query->count();
    }

    /**
     * Function for return parsed json string
     * @param  array $options
     * @return Builder
     */
    public function flushAllString($query, $nameId)
    {
        //DONT DO THIS SH*T, ANYMORE
        for ($i=0; $i < count($query); $i++) { 
            if (!is_null($query[$i]->$nameId)) {
                $stringJson = str_replace('|', '"', $query[$i]->$nameId);
                $query[$i]->$nameId = json_decode($stringJson);
            }
        }

        return $query;
    }

    public function smartDelete($model)
    {
        DB::beginTransaction();
        try {
            $model->flag_active = false;
            $model->deleted_at = date("Y-m-d H:i:s");
            $model->save();
        } catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }
}
