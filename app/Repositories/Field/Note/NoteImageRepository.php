<?php

namespace App\Repositories\Field\Note;
use App\Models\Field\Note\NoteImage as Model;
use App\Repositories\CoreRepository;

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


    public function deleteIfMine($id, $user_id, $note_user_id)
    {
        $record = $this->getEditOrFail($id);
        if ($user_id == $note_user_id){
            return $record->delete();
        }
        return false;
    }

}
