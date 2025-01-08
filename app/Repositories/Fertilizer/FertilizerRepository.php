<?php

namespace App\Repositories\Fertilizer;
use App\Models\Fertilizer\Fertilizer as Model;
use App\Repositories\CoreRepository;

class FertilizerRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->paginate($quantity);
    }

    public function getAll()
    {
        return $this->startConditions()->all();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
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
