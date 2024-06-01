<?php

namespace App\Repositories\Culture;
use App\Models\Culture\CultureSeasonWork as Model;
use App\Repositories\CoreRepository;

class CultureSeasonWorkRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('id', 'desc')->toBase()->paginate($quantity);
    }

    public function getByCultureSeasonIdPaginate($cultureId, $quantity)
    {
        return $this->startConditions()
            ->where('culture_season_id', $cultureId)
            ->toBase()
            ->paginate($quantity);
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()->with('cultureSeason')->findOrFail($id);
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
