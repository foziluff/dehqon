<?php

namespace App\Http\Controllers\Api\Conversion\Quantity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Conversion\Quantity\StoreConversionQuantityRequest;
use App\Http\Requests\Admin\Conversion\Quantity\UpdateConversionQuantityRequest;
use App\Repositories\Conversion\Quantity\ConversionQuantityRepository;

class ConversionQuantityController extends Controller
{
    private $conversionQuantityRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionQuantityRepository = app(ConversionQuantityRepository::class);
    }

    public function index()
    {
        $records = $this->conversionQuantityRepository->getAllWithPaginate(20);
        return response()->json($records);
    }

    public function filterByConversion($id)
    {
        $records = $this->conversionQuantityRepository->getByWorkConversionIdPaginate($id, 20);
        return response()->json($records);
    }

    public function store(StoreConversionQuantityRequest $request)
    {
        $record = $this->user->conversionQuantities()->create($request->validated());
        return response()->json($record, 201);
    }

    public function show($id)
    {
        $record = $this->conversionQuantityRepository->getEditOrFail($id);
        return response()->json($record);
    }

    public function update(UpdateConversionQuantityRequest $request, int $id)
    {
        $this->conversionQuantityRepository->update($id, $request->validated());
        return response()->json(['message' => 'Успешно обновлено!']);
    }

    public function destroy(int $id)
    {
        $this->conversionQuantityRepository->delete($id);
        return response()->json(['message' => 'Успешно удалено!']);
    }
}
