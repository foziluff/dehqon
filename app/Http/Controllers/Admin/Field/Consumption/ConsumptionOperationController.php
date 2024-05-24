<?php

namespace App\Http\Controllers\Admin\Field\Consumption;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\Consumption\Operation\StoreConsumptionOperationRequest;
use App\Http\Requests\Admin\Field\Consumption\Operation\UpdateConsumptionOperationRequest;
use App\Repositories\Field\Consumption\ConsumptionOperationRepository;

class ConsumptionOperationController extends Controller
{
    private $consumptionOperationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->consumptionOperationRepository = app(ConsumptionOperationRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->consumptionOperationRepository->getAllWithPaginate(20);
        return view('admin.field.consumption.consumptionOperation.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.field.consumption.consumptionOperation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsumptionOperationRequest $request)
    {
        $record = $this->consumptionOperationRepository->create($request->validated());
        return redirect()->route('consumptionOperations.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->consumptionOperationRepository->getEditOrFail($id);
        return view('admin.field.consumption.consumptionOperation.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->consumptionOperationRepository->getEditOrFail($id);
        return view('admin.field.consumption.consumptionOperation.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsumptionOperationRequest $request, int $id)
    {
        $this->consumptionOperationRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->consumptionOperationRepository->delete($id);
        return redirect()->route('consumptionOperations.index')->with(['success' => 'Успешно удален!']);
    }
}
