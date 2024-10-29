<?php

namespace App\Repositories\Stock;
use App\Models\Stock\StockConsumption as Model;
use App\Repositories\CoreRepository;

class StockConsumptionRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('id', 'desc')->with('field', 'stock')->paginate($quantity);
    }

    public function getByUserIdPaginate($user_id, $quantity)
    {
        return $this->startConditions()
            ->with('field', 'field.irrigation',  'field.culture',  'field.prevCulture',  'stock', 'stock.consumptionProductionMean')
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->paginate($quantity);
    }



    public function search($value)
    {
        return $this->startConditions()->where('title', 'like', "%$value%")->toBase()->get();
    }

    public function getAll()
    {
        return $this->startConditions()->all()->toBase();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
            ->with('field', 'field.irrigation',  'field.culture',  'field.prevCulture',  'stock', 'stock.consumptionProductionMean')
            ->findOrFail($id);
    }


    public function getEditOrFailForFront($id)
    {
        return $this->startConditions()
            ->where('user_id', $this->user->id)
            ->with('field', 'field.irrigation',  'field.culture',  'field.prevCulture',  'stock', 'stock.consumptionProductionMean')
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
