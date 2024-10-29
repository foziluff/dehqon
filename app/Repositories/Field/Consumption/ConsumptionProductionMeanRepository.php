<?php

namespace App\Repositories\Field\Consumption;
use App\Models\Field\Consumption\ConsumptionProductionMean as Model;
use App\Repositories\CoreRepository;

class ConsumptionProductionMeanRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->toBase()->paginate($quantity);
    }

    public function getAllWithPaginateForFront($quantity)
    {
        return $this->startConditions()
            ->where('user_id', $this->user->id)
            ->orWhereNull('user_id')
            ->toBase()
            ->paginate($quantity);
    }

    public function getAll()
    {
        return $this->startConditions()->all()->toBase();
    }

    public function getAllForFront()
    {
        return $this->startConditions()
            ->where('user_id', $this->user->id)
            ->orWhereNull('user_id')
            ->toBase()
            ->get();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()->findOrFail($id);
    }

    public function getEditOrFailForFront($id)
    {
        return $this->startConditions()
            ->where('user_id', $this->user->id)
            ->findOrFail($id);
    }

    public function update($id, $data)
    {
        $record = $this->getEditOrFail($id);
        $record->update($data);
        return $record;
    }

    public function updateForFront($id, $data)
    {
        $record = $this->getEditOrFailForFront($id);
        $record->update($data);
        return $record;
    }

    public function create($data)
    {
        return $this->startConditions()->create($data);
    }

    public function createForFront($data)
    {
        return $this->startConditions()->create($data);
    }

    public function delete($id)
    {
        $record = $this->getEditOrFail($id);
        return $record->delete();
    }

    public function deleteForFront($id)
    {
        $record = $this->getEditOrFailForFront($id);
        return $record->delete();
    }
}
