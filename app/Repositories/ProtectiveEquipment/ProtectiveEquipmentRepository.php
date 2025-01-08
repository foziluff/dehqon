<?php

namespace App\Repositories\ProtectiveEquipment;
use App\Models\ProtectiveEquipment\ProtectiveEquipment as Model;
use App\Repositories\CoreRepository;

class ProtectiveEquipmentRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getByFrontId($front_key)
    {
        return $this->startConditions()
            ->where('front_key', $front_key)
            ->first();
    }
    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('title_ru', 'asc')->paginate($quantity);
    }

    public function getAll()
    {
        return $this->startConditions()->all();
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
