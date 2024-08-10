<?php

namespace App\Repositories\Irrigation;
use App\Models\Irrigation\IrrigationType as Model;
use App\Repositories\CoreRepository;

class IrrigationTypeRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('title_ru', 'asc')->toBase()->paginate($quantity);
    }

    public function getByIrrigationIdPaginate($cultureId, $quantity)
    {
        return $this->startConditions()
            ->where('irrigation_id', $cultureId)
            ->toBase()
            ->paginate($quantity);
    }

    public function search($value)
    {
        return $this->startConditions()->where('title_ru', 'like', "%$value%")->toBase()->get();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()->with('irrigation')->findOrFail($id);
    }


    public function update($id, $data)
    {
        $record = $this->getEditOrFail($id);
        $record->update($data);
        return $record;
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
