<?php

namespace App\Http\Controllers\Admin\Field\Work;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\WorkStage\StoreWorkStageRequest;
use App\Http\Requests\Admin\Field\WorkStage\UpdateWorkStageRequest;
use App\Repositories\Field\Work\WorkRepository;
use App\Repositories\Field\Work\WorkStageRepository;

class WorkStageController extends Controller
{
    private $workStageRepository;
    private $workRepository;

    public function __construct()
    {
        parent::__construct();
        $this->workStageRepository = app(WorkStageRepository::class);
        $this->workRepository = app(WorkRepository ::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->workStageRepository->getAllWithPaginate(20);
        return view('admin.field.work.workStage.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $works = $this->workRepository->getAll();
        return view('admin.field.work.workStage.create', compact('works'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkStageRequest $request)
    {
        $record = $this->user->workStages()->create($request->validated());
        return redirect()->route('workStages.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->workStageRepository->getEditOrFail($id);
        return view('admin.field.work.workStage.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $works = $this->workRepository->getAll();
        $record = $this->workStageRepository->getEditOrFail($id);
        return view('admin.field.work.workStage.edit', compact('record', 'works'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkStageRequest $request, $id)
    {
        $this->workStageRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->workStageRepository->delete($id);
        return redirect()->route('workStages.index')->with(['success' => 'Успешно удален!']);
    }
}
