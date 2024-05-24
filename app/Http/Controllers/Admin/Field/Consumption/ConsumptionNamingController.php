<?php

namespace App\Http\Controllers\Admin\Field\Consumption;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\Consumption\Naming\StoreConsumptionNamingRequest;
use App\Http\Requests\Admin\Field\Consumption\Naming\UpdateConsumptionNamingRequest;
use App\Repositories\Field\Consumption\ConsumptionNamingRepository;

class ConsumptionNamingController extends Controller
{
    private $consumptionNamingRepository;

    public function __construct()
    {
        parent::__construct();
        $this->consumptionNamingRepository = app(ConsumptionNamingRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->consumptionNamingRepository->getAllWithPaginate(20);
        return view('admin.field.consumption.consumptionNaming.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.field.consumption.consumptionNaming.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsumptionNamingRequest $request)
    {
        $record = $this->consumptionNamingRepository->create($request->validated());
        return redirect()->route('consumptionNamings.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->consumptionNamingRepository->getEditOrFail($id);
        return view('admin.field.consumption.consumptionNaming.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->consumptionNamingRepository->getEditOrFail($id);
        return view('admin.field.consumption.consumptionNaming.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsumptionNamingRequest $request, int $id)
    {
        $this->consumptionNamingRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->consumptionNamingRepository->delete($id);
        return redirect()->route('consumptionNamings.index')->with(['success' => 'Успешно удален!']);
    }
}
