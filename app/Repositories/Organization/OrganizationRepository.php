<?php

namespace App\Repositories\Organization;
use App\Models\Organization\Organization as Model;
use App\Repositories\CoreRepository;

class OrganizationRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('title_ru', 'asc')->toBase()->paginate($quantity);
    }
    public function getAllForFront()
    {
        $langItems = ['title', 'address', 'description'];
        $records = $this->startConditions()->all();
        return $this->transformLang($records, $langItems);
    }

    public function search($value)
    {
        return $this->startConditions()->where('title_ru', 'like', "%$value%")->toBase()->get();
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
