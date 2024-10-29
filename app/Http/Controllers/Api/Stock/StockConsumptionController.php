<?php

namespace App\Http\Controllers\Api\Stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stock\StoreStockConsumptionRequest;
use App\Http\Requests\Admin\Stock\UpdateStockConsumptionRequest;
use App\Repositories\Stock\StockConsumptionRepository;

class StockConsumptionController extends Controller
{
    private $stockConsumptionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->stockConsumptionRepository = app(StockConsumptionRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->stockConsumptionRepository->getByUserIdPaginate($this->user->id, 20);
        return response()->json($records);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockConsumptionRequest $request)
    {
        $record = $this->user->stockConsumptions()->create($request->validated());
        return response()->json($this->show($record->id)->original, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->stockConsumptionRepository->getEditOrFailForFront($id);
        return response()->json($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockConsumptionRequest $request, $id)
    {
        $this->stockConsumptionRepository->updateForFront($id, $request->validated());
        return response()->json(['message' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->stockConsumptionRepository->deleteForFront($id);
        return response()->json(['message' => 'Успешно удален!']);
    }
}
