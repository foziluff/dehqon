<?php

namespace App\Http\Controllers\Admin\Field\Work;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\Work\StoreWorkRequest;
use App\Http\Requests\Admin\Field\Work\UpdateWorkRequest;
use App\Repositories\Field\Work\WorkRepository;

class WorkController extends Controller
{
    private $workRepository;

    public function __construct()
    {
        parent::__construct();
        $this->workRepository = app(WorkRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->workRepository->getAllWithPaginate(20);
        return view('admin.field.work.work.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.field.work.work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkRequest $request)
    {
        $record = $this->user->works()->create($request->validated());
        return redirect()->route('works.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->workRepository->getEditOrFail($id);
        return view('admin.field.work.work.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->workRepository->getEditOrFail($id);
        return view('admin.field.work.work.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkRequest $request, int $id)
    {
        $this->workRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->workRepository->delete($id);
        return redirect()->route('works.index')->with(['success' => 'Успешно удален!']);
    }
}
