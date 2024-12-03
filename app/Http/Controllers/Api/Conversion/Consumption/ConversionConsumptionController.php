<?php

namespace App\Http\Controllers\Api\Conversion\Consumption;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Conversion\Consumption\StoreConversionConsumptionRequest;
use App\Http\Requests\Admin\Conversion\Consumption\UpdateConversionConsumptionRequest;
use App\Repositories\Conversion\Consumption\ConversionConsumptionRepository;

class ConversionConsumptionController extends Controller
{
    private $conversionConsumptionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionConsumptionRepository = app(ConversionConsumptionRepository::class);
    }

    public function index()
    {
        $records = $this->conversionConsumptionRepository->getAllWithPaginate(20);
        return response()->json($records);
    }

    public function filterByConversion($id)
    {
        $records = $this->conversionConsumptionRepository->getByWorkConversionIdPaginate($id, 20);
        return response()->json($records);
    }

    public function store(StoreConversionConsumptionRequest $request)
    {
        $record = $this->user->conversionConsumptions()->create($request->validated());
        return response()->json($this->show($record->id)->original, 201);
    }

    public function show($id)
    {
        $record = $this->conversionConsumptionRepository->getEditOrFail($id);
        return response()->json($record);
    }

    public function update(UpdateConversionConsumptionRequest $request, int $id)
    {
        $this->conversionConsumptionRepository->update($id, $request->validated());
        return response()->json(['message' => 'Успешно обновлено!']);
    }

    public function destroy(int $id)
    {
        $this->conversionConsumptionRepository->delete($id);
        return response()->json(['message' => 'Успешно удалено!']);
    }
}
