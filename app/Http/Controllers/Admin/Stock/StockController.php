<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Stock\StoreStockRequest;
use App\Http\Requests\Admin\Stock\UpdateStockRequest;
use App\Repositories\Field\Consumption\ConversionProductionMeanRepository;
use App\Repositories\Stock\StockRepository;

class StockController extends Controller
{
    private $stockRepository;
    private $consumptionProductionMeanRepository;

    public function __construct()
    {
        parent::__construct();
        $this->stockRepository = app(StockRepository::class);
        $this->consumptionProductionMeanRepository = app(ConversionProductionMeanRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->stockRepository->getAllWithPaginate(20);
        return view('admin.stock.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consumptionProductionMeans = $this->consumptionProductionMeanRepository->getAll();
        return view('admin.stock.create', compact('consumptionProductionMeans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockRequest $request)
    {
        $record = $this->user->stocks()->create($request->validated());
        return redirect()->route('stocks.edit', $record->id)->with(['success' => 'Успешно обновлен!']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->stockRepository->getEditOrFail($id);
        return view('admin.stock.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $record = $this->stockRepository->getEditOrFail($id);
        $consumptionProductionMeans = $this->consumptionProductionMeanRepository->getAll();
        return view('admin.stock.edit', compact('record', 'consumptionProductionMeans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockRequest $request, $id)
    {
        $this->stockRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->stockRepository->delete($id);
        return redirect()->route('stocks.index')->with(['success' => 'Успешно удален!']);
    }
}
