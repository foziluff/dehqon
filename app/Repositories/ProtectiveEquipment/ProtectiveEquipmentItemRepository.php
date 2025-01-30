<?php

namespace App\Repositories\ProtectiveEquipment;
use App\Models\ProtectiveEquipment\ProtectiveEquipmentItem as Model;
use App\Repositories\CoreRepository;

class ProtectiveEquipmentItemRepository extends CoreRepository
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

    public function getByProtectiveEquipmentIdPaginate($protective_equipment_id, $quantity)
    {
        return $this->startConditions()
            ->where('protective_equipment_id', $protective_equipment_id)
            ->paginate($quantity);
    }

    public function getByProtectiveEquipmentId($protective_equipment_id)
    {
        return $this->startConditions()
            ->where('protective_equipment_id', $protective_equipment_id)
            ->get();
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
