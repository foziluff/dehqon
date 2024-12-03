<?php

namespace App\Http\Controllers\Api\Conversion\Income;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Conversion\Income\StoreConversionIncomeRequest;
use App\Http\Requests\Admin\Conversion\Income\UpdateConversionIncomeRequest;
use App\Repositories\Conversion\Income\ConversionIncomeRepository;

class ConversionIncomeController extends Controller
{
    private $conversionIncomeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionIncomeRepository = app(ConversionIncomeRepository::class);
    }

    public function index()
    {
        $records = $this->conversionIncomeRepository->getAllWithPaginate(20);
        return response()->json($records);
    }

    public function filterByConversion($id)
    {
        $records = $this->conversionIncomeRepository->getByWorkConversionIdPaginate($id, 20);
        return response()->json($records);
    }

    public function store(StoreConversionIncomeRequest $request)
    {
        $record = $this->user->conversionIncomes()->create($request->validated());
        return response()->json($record, 201);
    }

    public function show($id)
    {
        $record = $this->conversionIncomeRepository->getEditOrFail($id);
        return response()->json($record);
    }

    public function update(UpdateConversionIncomeRequest $request, int $id)
    {
        $this->conversionIncomeRepository->update($id, $request->validated());
        return response()->json(['message' => 'Успешно обновлено!']);
    }

    public function destroy(int $id)
    {
        $this->conversionIncomeRepository->delete($id);
        return response()->json(['message' => 'Успешно удалено!']);
    }
}
