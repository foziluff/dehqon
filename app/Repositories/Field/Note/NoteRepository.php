<?php

namespace App\Repositories\Field\Note;
use App\Models\Field\Note\Note as Model;
use App\Repositories\CoreRepository;

class NoteRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->with('field', 'problem')
            ->paginate($quantity);
    }

    public function getAllMyChatsWithPaginate($organization_id, $quantity)
    {
        return $this->startConditions()
            ->where('organization_id', $organization_id)
            ->orderBy('id', 'desc')
            ->with('field', 'problem', 'organization')
            ->paginate($quantity);
    }

    public function getByFieldIdPaginate($field_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('field_id', $field_id)
            ->with('field', 'problem', 'organization')
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

    public function getEditOrFail2($id, $organization_id)
    {
        return $this->startConditions()
            ->where('organization_id', $organization_id)
            ->with('problem', 'field', 'images', 'organization')
            ->findOrFail($id);
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
            ->with('problem', 'field', 'images', 'organization')
            ->findOrFail($id);
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
