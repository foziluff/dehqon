<?php

namespace App\Http\Controllers\Api\Stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stock\StoreStockRequest;
use App\Http\Requests\Admin\Stock\UpdateStockRequest;
use App\Repositories\Stock\StockRepository;
use Illuminate\Http\JsonResponse;

class StockController extends Controller
{
    private $stockRepository;

    public function __construct()
    {
        parent::__construct();
        $this->stockRepository = app(StockRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->stockRepository->getByUserIdPaginate($this->user->id, 20);
        return response()->json($records);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockRequest $request)
    {
        $record = $this->user->stocks()->create($request->validated());
        return response()->json($this->show($record->id)->original, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->stockRepository->getEditOrFail($id);
        return response()->json($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockRequest $request, $id)
    {
        $this->stockRepository->update($id, $request->validated());
        return response()->json(['message' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->stockRepository->delete($id);
        return response()->json(['message' => 'Успешно удален!']);
    }
}
