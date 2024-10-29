<?php

namespace App\Repositories\Field\Work;
use App\Models\Field\Work\WorkPlan as Model;
use App\Repositories\CoreRepository;
use Illuminate\Support\Facades\DB;

class WorkPlanRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getByFieldIdMine($field_id, $user_id)
    {
        return $this->startConditions()
            ->withCount(['workStages as total_work_stages' => function ($query) {
                $query->select(DB::raw('count(*)'));
            }])
            ->withCount(['workStages as done_work_stages' => function ($query) {
                $query->where('done', 1)->select(DB::raw('count(*)'));
            }])
            ->orderBy('id', 'desc')
            ->with('field', 'field.culture', 'field.prevCulture', 'field.irrigation')
            ->where('field_id', $field_id)
            ->where('user_id', $user_id)
            ->get();
    }



    public function getMineEditOrFail($id, $user_id)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->with('field', 'field.culture', 'field.prevCulture', 'field.irrigation')
            ->findOrFail($id);
    }

    public function deleteIfMine($id, $user_id)
    {
        $record = $this->getEditOrFail($id);
        if ($record->user_id == $user_id){
            return $record->delete();
        }
        return false;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->with('field', 'field.culture', 'field.prevCulture', 'field.irrigation')
            ->paginate($quantity);
    }

    public function getMineWithPaginate($user_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('user_id', $user_id)
            ->with('field', 'field.culture', 'field.prevCulture', 'field.irrigation')
            ->paginate($quantity);
    }

    public function getByFieldIdPaginate($field_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('field_id', $field_id)
            ->with('field', 'field.culture', 'field.prevCulture', 'field.irrigation')
            ->paginate($quantity);
    }


    public function getAllMine($user_id)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->with('field', 'field.culture', 'field.prevCulture', 'field.irrigation')
            ->get();
    }
    public function getAllByFieldId($field_id)
    {
        return $this->startConditions()
            ->where('field_id', $field_id)
            ->with('field', 'field.culture', 'field.prevCulture', 'field.irrigation')
            ->get();
    }

    public function search($value)
    {
        return $this->startConditions()->where('title', 'like', "%$value%")->toBase()->get();
    }

    public function getAll()
    {
        return $this->startConditions()->all()->toBase();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
            ->with('field', 'field.culture', 'field.prevCulture', 'field.irrigation')
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
