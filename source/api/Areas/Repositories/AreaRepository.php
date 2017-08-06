<?php

namespace Api\Areas\Repositories;

use Api\Areas\Models\Area;
use Infrastructure\Database\Eloquent\Repository;
use DB;
use Schema;

class AreaRepository extends Repository
{
    public function getModel()
    {
        return new Area();
    }

    public function create(array $data)
    {
        $area = $this->getModel();
        DB::beginTransaction();
        try {
            $area->fill($data);
            $area->save();
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $area;
    }

    public function update(Area $area, array $data)
    {
        DB::beginTransaction();
        try {
            $area->fill($data);
            $area->save();
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $area;
    }

    public function smartDelete(Area $area)
    {
        DB::beginTransaction();
        try {
            $area->flagactive = false;
            $area->deleted_at = date("Y-m-d H:i:s");
            $area->save();
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $area;
    }
}
