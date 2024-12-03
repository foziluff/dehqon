<?php

namespace App\Repositories\Conversion\Consumption;
use App\Models\Conversion\Consumption\ConversionConsumption as Model;
use App\Repositories\CoreRepository;

class ConversionConsumptionRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->with('consumptionProductionMean')->paginate($quantity);
    }

    public function getByWorkConversionIdPaginate($conversion_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('conversion_id', $conversion_id)
            ->with('consumptionProductionMean')
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
            ->with(
                'consumptionProductionMean',
            )
            ->findOrFail($id);
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
