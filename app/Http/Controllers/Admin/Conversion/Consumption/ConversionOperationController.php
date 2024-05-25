<?php

namespace App\Http\Controllers\Admin\Conversion\Consumption;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Conversion\Consumption\Operation\StoreConversionOperationRequest;
use App\Http\Requests\Admin\Conversion\Consumption\Operation\UpdateConversionOperationRequest;
use App\Repositories\Conversion\Consumption\ConversionOperationRepository;

class ConversionOperationController extends Controller
{
    private $conversionOperationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionOperationRepository = app(ConversionOperationRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->conversionOperationRepository->getAllWithPaginate(20);
        return view('admin.conversion.consumption.conversionOperation.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.conversion.consumption.conversionOperation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConversionOperationRequest $request)
    {
        $record = $this->conversionOperationRepository->create($request->validated());
        return redirect()->route('conversionOperations.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->conversionOperationRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.conversionOperation.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->conversionOperationRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.conversionOperation.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConversionOperationRequest $request, int $id)
    {
        $this->conversionOperationRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->conversionOperationRepository->delete($id);
        return redirect()->route('conversionOperations.index')->with(['success' => 'Успешно удален!']);
    }
}
