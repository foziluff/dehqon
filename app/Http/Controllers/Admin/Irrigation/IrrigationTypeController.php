<?php

namespace App\Http\Controllers\Admin\Irrigation;

use App\Actions\IrrigationTypeImagesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Irrigation\Type\StoreIrrigationTypeRequest;
use App\Http\Requests\Admin\Irrigation\Type\UpdateIrrigationTypeRequest;
use App\Repositories\Irrigation\IrrigationRepository;
use App\Repositories\Irrigation\IrrigationTypeImageRepository;
use App\Repositories\Irrigation\IrrigationTypeRepository;

class IrrigationTypeController extends Controller
{
    private $irrigationTypeRepository;
    private $irrigationRepository;
    private $irrigationTypeImageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->irrigationTypeRepository = app(IrrigationTypeRepository::class);
        $this->irrigationRepository = app(IrrigationRepository::class);
        $this->irrigationTypeImageRepository = app(IrrigationTypeImageRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->irrigationTypeRepository->getAllWithPaginate(20);
        return view('admin.irrigation.irrigationType.index', compact('records'));
    }

    /**
     * Display a filterByCulture of the resource.
     */
    public function filterByIrrigation($id)
    {
        $records = $this->irrigationTypeRepository->getByIrrigationIdPaginate($id, 20);
        return view('admin.irrigation.irrigationType.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $irrigations = $this->irrigationRepository->getAll();
        return view('admin.irrigation.irrigationType.create', compact('irrigations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIrrigationTypeRequest $request)
    {
        $record = $this->irrigationTypeRepository->create($request->validated());
        app(IrrigationTypeImagesAction::class)->handle($request, $record->id);
        return redirect()->route('irrigationTypes.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->irrigationTypeRepository->getEditOrFail($id);
        $images = $this->irrigationTypeImageRepository->getByIrrigationTypeId($record->id);
        return view('admin.irrigation.irrigationType.show', compact('record', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $irrigations = $this->irrigationRepository->getAll();
        $record = $this->irrigationTypeRepository->getEditOrFail($id);
        $images = $this->irrigationTypeImageRepository->getByIrrigationTypeId($record->id);
        return view('admin.irrigation.irrigationType.edit', compact('record', 'images', 'irrigations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIrrigationTypeRequest $request, int $id)
    {
        $record = $this->irrigationTypeRepository->update($id, $request->validated());
        app(IrrigationTypeImagesAction::class)->handle($request, $record->id);
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->irrigationTypeRepository->delete($id);
        return redirect()->route('irrigationTypes.index')->with(['success' => 'Успешно удален!']);
    }
}
