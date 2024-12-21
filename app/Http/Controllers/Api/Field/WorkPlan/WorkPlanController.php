<?php

namespace App\Http\Controllers\Api\Field\WorkPlan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Field\WorkPlan\StoreWorkPlanRequest;
use App\Http\Requests\Admin\Field\WorkPlan\UpdateWorkPlanRequest;
use App\Repositories\Field\Work\WorkPlanRepository;

class WorkPlanController extends Controller
{
    private $workPlanRepository;

    public function __construct()
    {
        parent::__construct();
        $this->workPlanRepository = app(WorkPlanRepository::class);
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function index()
    {
        $records = $this->workPlanRepository->getMineWithPaginate($this->user->id, 20);
        return response()->json($records, 200);
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByField($id)
    {
        $records = $this->workPlanRepository->getByFieldIdMine($id, $this->user->id);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkPlanRequest $request)
    {
        $record = $this->user->workPlans()->create($request->validated());
        return response()->json($record->load('field', 'field.culture', 'field.prevCulture', 'field.irrigation'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = $this->workPlanRepository->getMineEditOrFail($id, $this->user->id);
        return response()->json($record, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkPlanRequest $request, $id)
    {
        $record = $this->workPlanRepository->update($id, $request->validated());
        return response()->json($record, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->workPlanRepository->deleteIfMine($id, $this->user->id);
        return response()->json(['message' => $deleted ? 'Deleted successfully' : 'Not found'], $deleted ? 200 : 404);
    }
}

