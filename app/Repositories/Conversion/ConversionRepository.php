<?php

namespace App\Repositories\Conversion;
use App\Models\Conversion\Conversion as Model;
use App\Repositories\CoreRepository;

class ConversionRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('title', 'asc')->toBase()->paginate($quantity);
    }

    public function getByUserIdPaginate($user_id, $quantity)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->orderBy('title', 'asc')
            ->toBase()
            ->paginate($quantity);
    }


    public function getAllMine($user_id)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
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
