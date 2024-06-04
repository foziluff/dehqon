<?php

namespace App\Repositories\Message;
use App\Models\Message\Message as Model;
use App\Repositories\CoreRepository;

class MessageRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('id', 'asc')->toBase()->paginate($quantity);
    }

    public function getByNoteId($note_id)
    {
        return $this->startConditions()
            ->where('note_id', $note_id)
            ->orderBy('id', 'asc')
            ->with('user')
            ->get();
    }

    public function search($value)
    {
        return $this->startConditions()->where('id', 'like', "%$value%")->toBase()->get();
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
