<?php

namespace App\Http\Controllers\Admin\Conversion\Consumption;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Conversion\Consumption\ProductionMean\StoreConversionProductionMeanRequest;
use App\Http\Requests\Admin\Conversion\Consumption\ProductionMean\UpdateConversionProductionMeanRequest;
use App\Repositories\Conversion\Consumption\ConversionProductionMeanRepository;

class ConversionProductionMeanController extends Controller
{
    private $conversionProductionMeanRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionProductionMeanRepository = app(ConversionProductionMeanRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->conversionProductionMeanRepository->getAllWithPaginate(20);
        return view('admin.conversion.consumption.conversionProductionMean.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.conversion.consumption.conversionProductionMean.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConversionProductionMeanRequest $request)
    {
        $record = $this->conversionProductionMeanRepository->create($request->validated());
        return redirect()->route('conversionProductionMeans.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->conversionProductionMeanRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.conversionProductionMean.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->conversionProductionMeanRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.conversionProductionMean.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConversionProductionMeanRequest $request, int $id)
    {
        $this->conversionProductionMeanRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->conversionProductionMeanRepository->delete($id);
        return redirect()->route('conversionProductionMeans.index')->with(['success' => 'Успешно удален!']);
    }
}
