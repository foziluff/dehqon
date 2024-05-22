<?php

namespace App\Repositories;
use App\Models\NoteImage as Model;

class NoteImageRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getByNoteId($id)
    {
        return $this->startConditions()->where('note_id', $id)->toBase()->get();
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
