<?php

namespace App\Repositories\Irrigation;
use App\Models\Irrigation\IrrigationTypeImage as Model;
use App\Repositories\CoreRepository;

class IrrigationTypeImageRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getByIrrigationTypeId($id)
    {
        return $this->startConditions()->where('irrigation_type_id', $id)->toBase()->get();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
            ->findOrFail($id);
    }

    public function create($data)
    {
        return $this->startConditions()->create($data);
    }

    public function delete($id)
    {
        $record = $this->getEditOrFail($id);
        return $record->delete();
    }

}
