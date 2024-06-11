<?php

namespace App\Http\Controllers\Admin\Field;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\StoreFieldRequest;
use App\Http\Requests\Admin\Field\UpdateFieldRequest;
use App\Repositories\Culture\CultureRepository;
use App\Repositories\Field\FieldRepository;
use App\Repositories\FuelType\FuelTypeRepository;

class FieldController extends Controller
{
    private $fieldRepository;
    private $cultureRepository;
    private $fuelTypeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->fieldRepository = app(FieldRepository::class);
        $this->cultureRepository = app(CultureRepository::class);
        $this->fuelTypeRepository = app(FuelTypeRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->fieldRepository->getAllWithPaginate(20);
        return view('admin.field.index', compact('records'));
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByUser($id)
    {
        $records = $this->fieldRepository->getByUserIdPaginate($id, 20);
        return view('admin.field.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cultures = $this->cultureRepository->getAll();
        $fuelTypes = $this->fuelTypeRepository->getAll();
        return view('admin.field.create', compact('cultures', 'fuelTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFieldRequest $request)
    {
        $record = $this->user->fields()->create($request->validated());
        return redirect()->route('fields.edit', $record->id)->with(['success' => 'Успешно добавлено!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $record = $this->fieldRepository->getEditOrFail($id);
        return view('admin.field.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $cultures = $this->cultureRepository->getAll();
        $fuelTypes = $this->fuelTypeRepository->getAll();
        $record = $this->fieldRepository->getEditOrFail($id);
        return view('admin.field.edit', compact('record', 'cultures', 'fuelTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFieldRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $validatedData['coordinates'] = json_decode($validatedData['coordinates'][0], true);
        $this->fieldRepository->update($id, $validatedData);
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->fieldRepository->delete($id);
        return redirect()->route('fields.index')->with(['success' => 'Успешно удален!']);
    }
}
