<?php

namespace App\Repositories\Field\Note;
use App\Models\Field\Note\NoteShow as Model;
use App\Repositories\CoreRepository;

class NoteShowRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
            ->findOrFail($id);
    }


    public function getAllByUserId($user_id)
    {
        return $this->startConditions()
            ->where('asked_for_user_id', $user_id)
            ->get();
    }

    public function count($asking_user_id, $asked_for_user_id)
    {
        return $this->startConditions()
            ->where('asking_user_id', $asking_user_id)
            ->where('asked_for_user_id', $asked_for_user_id)
            ->count();
    }

    public function getAccess($asking_user_id, $asked_for_user_id)
    {
        return $this->startConditions()
            ->where('access', 1)
            ->where('asking_user_id', $asking_user_id)
            ->where('asked_for_user_id', $asked_for_user_id)
            ->count();
    }



    public function update($id, $data)
    {
        $record = $this->getEditOrFail($id);
        $record->update(['access' => 1]);
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
