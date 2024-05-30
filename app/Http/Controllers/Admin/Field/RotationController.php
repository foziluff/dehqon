<?php

namespace App\Http\Controllers\Admin\Field;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\Rotation\StoreRotationRequest;
use App\Http\Requests\Admin\Field\Rotation\UpdateRotationRequest;
use App\Repositories\Culture\CultureRepository;
use App\Repositories\Field\FieldRepository;
use App\Repositories\Field\RotationRepository;

class RotationController extends Controller
{
    private $rotationRepository;
    private $fieldRepository;
    private $cultureRepository;

    public function __construct()
    {
        parent::__construct();
        $this->rotationRepository = app(RotationRepository::class);
        $this->fieldRepository = app(FieldRepository ::class);
        $this->cultureRepository = app(CultureRepository ::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->rotationRepository->getAllWithPaginate(20);
        return view('admin.field.rotation.index', compact('records'));
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByField($id)
    {
        $records = $this->rotationRepository->getByFieldIdPaginate($id, 20);
        return view('admin.field.rotation.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        $cultures = $this->cultureRepository->getAll();

        return view('admin.field.rotation.create', compact('fields', 'cultures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRotationRequest $request)
    {
        $record = $this->user->rotations()->create($request->validated());
        return redirect()->route('rotations.edit', $record->id)->with(['success' => 'Успешно добавлено!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->rotationRepository->getEditOrFail($id);
        return view('admin.field.rotation.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        $cultures = $this->cultureRepository->getAll();
        $record = $this->rotationRepository->getEditOrFail($id);
        return view('admin.field.rotation.edit', compact('record', 'cultures', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRotationRequest $request, $id)
    {
        $this->rotationRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлено!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->rotationRepository->delete($id);
        return redirect()->route('rotations.index')->with(['success' => 'Успешно удалено!']);
    }
}
