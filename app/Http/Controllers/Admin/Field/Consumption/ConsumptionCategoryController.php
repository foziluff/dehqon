<?php

namespace App\Http\Controllers\Admin\Field\Consumption;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\Consumption\Category\StoreConsumptionCategoryRequest;
use App\Http\Requests\Admin\Field\Consumption\Category\UpdateConsumptionCategoryRequest;
use App\Repositories\Field\Consumption\ConsumptionCategoryRepository;

class ConsumptionCategoryController extends Controller
{
    private $consumptionCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->consumptionCategoryRepository = app(ConsumptionCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->consumptionCategoryRepository->getAllWithPaginate(20);
        return view('admin.field.consumption.consumptionCategory.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.field.consumption.consumptionCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsumptionCategoryRequest $request)
    {
        $record = $this->consumptionCategoryRepository->create($request->validated());
        return redirect()->route('consumptionCategories.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->consumptionCategoryRepository->getEditOrFail($id);
        return view('admin.field.consumption.consumptionCategory.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->consumptionCategoryRepository->getEditOrFail($id);
        return view('admin.field.consumption.consumptionCategory.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsumptionCategoryRequest $request, int $id)
    {
        $this->consumptionCategoryRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->consumptionCategoryRepository->delete($id);
        return redirect()->route('consumptionCategories.index')->with(['success' => 'Успешно удален!']);
    }
}
