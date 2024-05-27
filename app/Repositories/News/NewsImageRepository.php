<?php

namespace App\Repositories\News;
use App\Models\News\NewsImage as Model;
use App\Repositories\CoreRepository;

class NewsImageRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getByNewsId($id)
    {
        return $this->startConditions()->where('news_id', $id)->toBase()->get();
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

