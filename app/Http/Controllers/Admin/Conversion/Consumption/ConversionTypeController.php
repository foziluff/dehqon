<?php

namespace App\Http\Controllers\Admin\Conversion\Consumption;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Conversion\Consumption\Type\StoreConversionTypeRequest;
use App\Http\Requests\Admin\Conversion\Consumption\Type\UpdateConversionTypeRequest;
use App\Repositories\Conversion\Consumption\ConversionTypeRepository;

class ConversionTypeController extends Controller
{
    private $conversionTypeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionTypeRepository = app(ConversionTypeRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->conversionTypeRepository->getAllWithPaginate(20);
        return view('admin.conversion.consumption.conversionType.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.conversion.consumption.conversionType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConversionTypeRequest $request)
    {
        $record = $this->conversionTypeRepository->create($request->validated());
        return redirect()->route('conversionTypes.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->conversionTypeRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.conversionType.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->conversionTypeRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.conversionType.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConversionTypeRequest $request, int $id)
    {
        $this->conversionTypeRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->conversionTypeRepository->delete($id);
        return redirect()->route('conversionTypes.index')->with(['success' => 'Успешно удален!']);
    }
}
