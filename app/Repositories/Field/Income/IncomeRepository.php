<?php

namespace App\Repositories\Field\Income;
use App\Models\Field\Income\Income as Model;
use App\Repositories\CoreRepository;

class IncomeRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('id', 'desc')->with('productType')->paginate($quantity);
    }

    public function getByFieldIdPaginate($field_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('field_id', $field_id)
            ->with('productType')
            ->paginate($quantity);
    }


    public function getMineEditOrFail($id, $user_id)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->findOrFail($id);
    }

    public function getByFieldIdMine($field_id, $user_id)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('field_id', $field_id)
            ->where('user_id', $user_id)
            ->paginate(20);
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
                'productType',
                'field',
                'culture'
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

    public function deleteIfMine($id, $user_id)
    {
        $record = $this->getEditOrFail($id);
        if ($record->user_id == $user_id){
            return $record->delete();
        }
        return false;
    }

}
