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

    public function getByNoteIdWithPaginate($note_id, $quantity)
    {
        return $this->startConditions()
            ->where('note_id', $note_id)
            ->orderBy('id', 'asc')
            ->with('user')
            ->paginate($quantity);
    }

    public function getByNoteIdWithPaginateForFront($note_id, $quantity)
    {
        return $this->startConditions()
            ->where('note_id', $note_id)
            ->orderBy('id', 'desc')
            ->paginate($quantity);
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

    public function getMineEditOrFail($id)
    {
        return $this->startConditions()->where('user_id', $this->user->id)->findOrFail($id);
    }


    public function update($id, $data)
    {
        $record = $this->getEditOrFail($id);
        $record->update($data);
        return $record;
    }


    public function updateIfMine($id, $data)
    {
        $record = $this->getMineEditOrFail($id);
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

    public function deleteIfMine($id)
    {
        $record = $this->getMineEditOrFail($id);
        return $record->delete();
    }

}
