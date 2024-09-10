<?php

namespace App\Http\Controllers\Api\Field\WorkPlan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Field\WorkStage\StoreWorkStageRequest;
use App\Http\Requests\Admin\Field\WorkStage\UpdateWorkStageRequest;
use App\Repositories\Field\Work\WorkStageRepository;
use Random\RandomException;

class WorkStageController extends Controller
{
    private $workStageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->workStageRepository = app(WorkStageRepository::class);
    }

    /**
     * Display a filterByField of the resource.
     * @throws RandomException
     */
    public function filterByPlan($id)
    {
        $records = $this->workStageRepository->getByPlanIdMine($id, $this->user->id, 20);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkStageRequest $request)
    {
        $record = $this->user->workStages()->create($request->validated());
        return response()->json($record, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = $this->workStageRepository->getMineEditOrFail($id, $this->user->id);
        return response()->json($record, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkStageRequest $request, $id)
    {
        $record = $this->workStageRepository->update($id, $request->validated());
        return response()->json($record, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->workStageRepository->deleteIfMine($id, $this->user->id);
        return response()->json(['message' => $deleted ? 'Deleted successfully' : 'Not found'], $deleted ? 200 : 404);
    }
}
