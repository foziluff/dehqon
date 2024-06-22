<?php

namespace App\Http\Controllers\Admin\Conversion\Consumption;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Conversion\Consumption\Naming\StoreConversionNamingRequest;
use App\Http\Requests\Admin\Conversion\Consumption\Naming\UpdateConversionNamingRequest;
use App\Repositories\Conversion\Consumption\ConversionNamingRepository;

class ConversionNamingController extends Controller
{
    private $conversionNamingRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionNamingRepository = app(ConversionNamingRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->conversionNamingRepository->getAllWithPaginate(20);
        return view('admin.conversion.consumption.conversionNaming.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.conversion.consumption.conversionNaming.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConversionNamingRequest $request)
    {
        $record = $this->conversionNamingRepository->create($request->validated());
        return redirect()->route('conversionNamings.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->conversionNamingRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.conversionNaming.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->conversionNamingRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.conversionNaming.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConversionNamingRequest $request, int $id)
    {
        $this->conversionNamingRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->conversionNamingRepository->delete($id);
        return redirect()->route('conversionNamings.index')->with(['success' => 'Успешно удален!']);
    }
}
