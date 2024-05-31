<?php

namespace App\Repositories\Culture;
use App\Models\Culture\CultureSeasonImage as Model;
use App\Repositories\CoreRepository;

class CultureSeasonImageRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getByCultureSeasonId($id)
    {
        return $this->startConditions()->where('culture_season_id', $id)->toBase()->get();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
            ->findOrFail($id);
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
