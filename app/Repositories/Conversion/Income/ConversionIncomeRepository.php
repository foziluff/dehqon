<?php

namespace App\Repositories\Conversion\Income;
use App\Models\Conversion\Income\ConversionIncome as Model;
use App\Repositories\CoreRepository;

class ConversionIncomeRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('id', 'desc')->paginate($quantity);
    }

    public function getByWorkConversionIdPaginate($conversion_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('conversion_id', $conversion_id)
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
                'conversion',
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
