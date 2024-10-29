<?php

namespace App\Repositories\Field;
use App\Models\Field\Field as Model;
use App\Repositories\CoreRepository;

class FieldRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('title', 'asc')->toBase()->paginate($quantity);
    }

    public function getByUserIdPaginate($user_id, $quantity)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->orderBy('title', 'asc')
            ->with('culture', 'prevCulture')
            ->paginate($quantity);
    }

    public function getAllMine($user_id)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->with('culture', 'prevCulture')
            ->get();
    }

    public function getAllMineWithPaginate($user_id, $quantity)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->with('culture', 'prevCulture')
            ->paginate($quantity);
    }

    public function getOnlyMineWithChildrenOrFail($id)
    {
        return $this->startConditions()
            ->where('id', $id)
            ->where('user_id', '=', $this->user->id)
            ->orderBy('id', 'desc')
            ->with('culture', 'prevCulture')
            ->firstOrFail();
    }
    public function search($value)
    {
        return $this->startConditions()->where('title', 'like', "%$value%")
            ->with('culture', 'prevCulture')->get();
    }

    public function getAll()
    {
        return $this->startConditions()->all()->toBase();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
            ->with('culture', 'prevCulture', 'irrigation')
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
