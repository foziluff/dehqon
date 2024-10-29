<?php

namespace App\Http\Controllers\Api\Field\Consumption;

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
        $records = $this->consumptionProductionMeanRepository->getAllForFront(20);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsumptionProductionMeanRequest $request)
    {
        $record = $this->user->consumptionProductionMean()->create($request->validated());
        return response()->json($record, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->consumptionProductionMeanRepository->getEditOrFailForFront($id);
        return response()->json($record, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsumptionProductionMeanRequest $request, int $id)
    {
        $this->consumptionProductionMeanRepository->updateForFront($id, $request->validated());
        return response()->json(['success' => 'Успешно обновлен!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->consumptionProductionMeanRepository->deleteForFront($id);
        return response()->json(['success' => 'Успешно удален!'], 200);
    }
}
