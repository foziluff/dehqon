<?php

namespace App\Repositories\Culture;
use App\Models\Culture\CultureSeason as Model;
use App\Repositories\CoreRepository;

class CultureSeasonRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('title', 'asc')->toBase()->paginate($quantity);
    }

    public function getByCultureIdPaginate($cultureId, $quantity)
    {
        return $this->startConditions()
            ->where('culture_id', $cultureId)
            ->toBase()
            ->paginate($quantity);
    }

    public function search($value)
    {
        return $this->startConditions()->where('title', 'like', "%$value%")->toBase()->get();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()->with('culture')->findOrFail($id);
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
