<?php

namespace App\Http\Controllers\Admin\Field\Work;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\WorkPlan\StoreWorkPlanRequest;
use App\Http\Requests\Admin\Field\WorkPlan\UpdateWorkPlanRequest;
use App\Repositories\Field\FieldRepository;
use App\Repositories\Field\Work\WorkPlanRepository;

class WorkPlanController extends Controller
{
    private $workPlanRepository;
    private $fieldRepository;

    public function __construct()
    {
        parent::__construct();
        $this->workPlanRepository = app(WorkPlanRepository::class);
        $this->fieldRepository = app(FieldRepository ::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->workPlanRepository->getAllWithPaginate(20);
        return view('admin.field.work.workPlan.index', compact('records'));
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByField($id)
    {
        $records = $this->workPlanRepository->getByFieldIdPaginate($id, 20);
        return view('admin.field.work.workPlan.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        return view('admin.field.work.workPlan.create', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkPlanRequest $request)
    {
        $record = $this->user->workPlans()->create($request->validated());
        return redirect()->route('workPlans.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->workPlanRepository->getEditOrFail($id);
        return view('admin.field.work.workPlan.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        $record = $this->workPlanRepository->getEditOrFail($id);
        return view('admin.field.work.workPlan.edit', compact('record', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkPlanRequest $request, $id)
    {
        $this->workPlanRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->workPlanRepository->delete($id);
        return redirect()->route('workPlans.index')->with(['success' => 'Успешно удален!']);
    }
}
