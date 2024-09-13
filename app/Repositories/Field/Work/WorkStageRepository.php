<?php

namespace App\Repositories\Field\Work;
use App\Models\Field\Work\WorkStage as Model;
use App\Repositories\CoreRepository;

class WorkStageRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->with('workPlan')
            ->paginate($quantity);
    }

    public function getMineEditOrFail($id, $user_id)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->with('workPlan')
            ->findOrFail($id);
    }

    public function getByPlanIdMine($planId, $userId, $quantity)
    {
        return $this->startConditions()
            ->where('user_id', $userId)
            ->where('work_plan_id', $planId)
            ->with('workPlan')
            ->paginate($quantity);
    }

    public function getByWorkPlanIdPaginate($work_plan_id, $quantity)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->where('work_plan_id', $work_plan_id)
            ->with('workPlan')
            ->paginate($quantity);
    }


    public function getAll()
    {
        return $this->startConditions()->all()->toBase();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
            ->with('workPlan')->findOrFail($id);
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
    public function deleteIfMine($id, $user_id)
    {
        $record = $this->getEditOrFail($id);
        if ($record->user_id == $user_id){
            return $record->delete();
        }
        return false;
    }
    public function delete($id)
    {
        $record = $this->getEditOrFail($id);
        return $record->delete();
    }

}
