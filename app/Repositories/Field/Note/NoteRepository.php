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
            ->with('field', 'field.culture','field.prevCulture', 'field.irrigation',  'problem', 'images')
            ->paginate($quantity);
    }

    public function getAllMineWithPaginate($user_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('user_id', $user_id)
            ->with('field', 'field.culture','field.prevCulture', 'field.irrigation',  'problem', 'images')
            ->paginate($quantity);
    }

    public function getAllMyChatsWithPaginate($organization_id, $quantity)
    {
        return $this->startConditions()
            ->where('organization_id', $organization_id)
            ->orderBy('id', 'desc')
            ->with('field', 'field.culture','field.prevCulture', 'field.irrigation',  'problem', 'organization', 'images')
            ->paginate($quantity);
    }

    public function getByFieldIdPaginate($field_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('field_id', $field_id)
            ->with('field', 'field.culture','field.prevCulture', 'field.irrigation',  'problem', 'organization', 'images')
            ->paginate($quantity);
    }

    public function getByFieldIdMine($field_id, $user_id)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('field_id', $field_id)
            ->where('user_id', $user_id)
//            ->with('problem', 'organization')
            ->with('field', 'field.culture','field.prevCulture', 'field.irrigation',  'images')
            ->get();
    }

    public function getByFieldIdMineFront($field_id, $user_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('field_id', $field_id)
            ->where('user_id', $user_id)
            ->with('problem', 'organization', 'field', 'field.culture','field.prevCulture', 'field.irrigation',  'images')
            ->paginate($quantity);
    }

    public function getByStatusMine($status, $user_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('status', $status)
            ->where('user_id', $user_id)
            ->with('problem', 'organization', 'field', 'field.culture','field.prevCulture', 'field.irrigation',  'images')
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
            ->with('problem', 'field', 'field.culture','field.prevCulture', 'field.irrigation',  'images', 'organization')
            ->findOrFail($id);
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
            ->with('problem', 'field', 'field.culture','field.prevCulture', 'field.irrigation',  'images', 'organization')
            ->findOrFail($id);
    }

    public function getMineEditOrFail($id, $user_id)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->with('images', 'field',  'field.culture','field.prevCulture', 'field.irrigation', )
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


    public function deleteIfMine($id, $user_id)
    {
        $record = $this->getEditOrFail($id);
        if ($record->user_id == $user_id){
            return $record->delete();
        }
        return false;
    }
}
