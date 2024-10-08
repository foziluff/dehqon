<?php

namespace App\Repositories\FuelType;
use App\Models\FuelType\FuelType as Model;
use App\Repositories\CoreRepository;

class FuelTypeRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('title', 'asc')->toBase()->paginate($quantity);
    }

    public function getAllWithPaginateCatId($quantity, $catId)
    {
        return $this->startConditions()
            ->where('category_id', $catId)
            ->toBase()
            ->paginate($quantity);
    }

    public function search($value)
    {
        return $this->startConditions()->where('title', 'like', "%$value%")->toBase()->get();
    }

    public function getAll()
    {
        return  $this->startConditions()->all()->toBase();
    }

    public function getAllForFront()
    {
        $langItems = ['title'];
        $records = $this->startConditions()->all()->toBase();
        return $this->transformLang($records, $langItems);
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()->findOrFail($id);
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
