<?php

namespace App\Http\Controllers\Admin\Field\Consumption;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Field\Consumption\ProductionMean\StoreConsumptionProductionMeanRequest;
use App\Http\Requests\Admin\Field\Consumption\ProductionMean\UpdateConsumptionProductionMeanRequest;
use App\Repositories\Field\Consumption\ConsumptionProductionMeanRepository;

class ConsumptionProductionMeanController extends Controller
{
    private $consumptionProductionMeanRepository;

    public function __construct()
    {
        parent::__construct();
        $this->consumptionProductionMeanRepository = app(ConsumptionProductionMeanRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->consumptionProductionMeanRepository->getAllWithPaginate(20);
        return view('admin.field.consumption.consumptionProductionMean.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.field.consumption.consumptionProductionMean.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsumptionProductionMeanRequest $request)
    {
        $record = $this->consumptionProductionMeanRepository->create($request->validated());
        return redirect()->route('consumptionProductionMeans.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->consumptionProductionMeanRepository->getEditOrFail($id);
        return view('admin.field.consumption.consumptionProductionMean.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->consumptionProductionMeanRepository->getEditOrFail($id);
        return view('admin.field.consumption.consumptionProductionMean.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsumptionProductionMeanRequest $request, int $id)
    {
        $this->consumptionProductionMeanRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->consumptionProductionMeanRepository->delete($id);
        return redirect()->route('consumptionProductionMeans.index')->with(['success' => 'Успешно удален!']);
    }
}
