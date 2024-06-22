<?php

namespace App\Http\Controllers\Admin\Conversion\Consumption;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Conversion\Consumption\Category\StoreConversionCategoryRequest;
use App\Http\Requests\Admin\Conversion\Consumption\Category\UpdateConversionCategoryRequest;
use App\Repositories\Conversion\Consumption\ConversionCategoryRepository;

class ConversionCategoryController extends Controller
{
    private $conversionCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionCategoryRepository = app(ConversionCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->conversionCategoryRepository->getAllWithPaginate(20);
        return view('admin.conversion.consumption.conversionCategory.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.conversion.consumption.conversionCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConversionCategoryRequest $request)
    {
        $record = $this->conversionCategoryRepository->create($request->validated());
        return redirect()->route('conversionCategories.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->conversionCategoryRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.conversionCategory.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->conversionCategoryRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.conversionCategory.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConversionCategoryRequest $request, int $id)
    {
        $this->conversionCategoryRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->conversionCategoryRepository->delete($id);
        return redirect()->route('conversionCategories.index')->with(['success' => 'Успешно удален!']);
    }
}
