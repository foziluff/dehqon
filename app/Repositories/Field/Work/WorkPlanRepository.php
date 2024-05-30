<?php

namespace App\Repositories\Field\Work;
use App\Models\Field\Work\WorkPlan as Model;
use App\Repositories\CoreRepository;

class WorkPlanRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->with('field')
            ->paginate($quantity);
    }

    public function getByFieldIdPaginate($field_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('field_id', $field_id)
            ->with('field')
            ->paginate($quantity);
    }


    public function getAllMine($user_id)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->toBase()
            ->get();
    }
    public function getAllByFieldId($field_id)
    {
        return $this->startConditions()
            ->where('field_id', $field_id)
            ->toBase()
            ->get();
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
            ->with('field',)
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
