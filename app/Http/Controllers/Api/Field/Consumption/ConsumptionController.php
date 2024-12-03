<?php

namespace App\Http\Controllers\Api\Field\Consumption;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Field\Consumption\StoreConsumptionRequest;
use App\Http\Requests\Admin\Field\Consumption\UpdateConsumptionRequest;
use App\Repositories\Field\Consumption\ConsumptionRepository;

class ConsumptionController extends Controller
{
    private $consumptionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->consumptionRepository = app(ConsumptionRepository::class);
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByField($id)
    {
        $records = $this->consumptionRepository->getByFieldIdMine($id, $this->user->id);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsumptionRequest $request)
    {
        $record = $this->user->consumptions()->create($request->validated());
        return response()->json($record->load('culture', 'consumptionProductionMean', 'stockConsumption', 'stockConsumption.stock'), 201);
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $record = $this->consumptionRepository->getMineEditOrFail($id, $this->user->id);
        return response()->json($record, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsumptionRequest $request, $id)
    {
        $record = $this->consumptionRepository->update($id, $request->validated());
        return response()->json($record, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->consumptionRepository->deleteIfMine($id, $this->user->id);
        return response()->json(['message' => $deleted ? 'Deleted successfully' : 'Not found'], $deleted ? 200 : 404);
    }
}

