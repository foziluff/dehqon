<?php

namespace App\Repositories\Culture;
use App\Models\Culture\Culture as Model;
use App\Repositories\CoreRepository;

class CultureRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('title_ru', 'asc')->toBase()->paginate($quantity);
    }

    public function getAllWithPaginateCatId($quantity, $catId)
    {
        return $this->startConditions()
            ->where('category_id', $catId)
            ->toBase()
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

    public function getAllWithChildren()
    {
        $langItems = ['title'];

        $records = $this->startConditions()
            ->with('seasons', 'seasons.images', 'seasons.works')
            ->get();

        foreach ($records as $record) {
            foreach ($record->seasons as $season){
                if($season->works) {
                    $this->transformLang($season->works, ['work']);
                }
            }
            if ($record->seasons) {
                $this->transformLang($record->seasons, $langItems);
            }
        }

        return $this->transformLang($records, $langItems);
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
