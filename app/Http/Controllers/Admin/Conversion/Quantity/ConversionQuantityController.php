<?php

namespace App\Http\Controllers\Admin\Conversion\Quantity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Conversion\Quantity\StoreConversionQuantityRequest;
use App\Http\Requests\Admin\Conversion\Quantity\UpdateConversionQuantityRequest;
use App\Repositories\Conversion\Consumption\ConversionNamingRepository;
use App\Repositories\Conversion\Consumption\ConversionTypeRepository;
use App\Repositories\Conversion\ConversionRepository;
use App\Repositories\Conversion\Quantity\ConversionQuantityRepository;

class ConversionQuantityController extends Controller
{
    private $conversionQuantityRepository;
    private $conversionTypeRepository;
    private $conversionRepository;
    private $conversionNamingRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionQuantityRepository = app(ConversionQuantityRepository::class);
        $this->conversionTypeRepository = app(ConversionTypeRepository::class);
        $this->conversionRepository = app(ConversionRepository::class);
        $this->conversionNamingRepository = app(ConversionNamingRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->conversionQuantityRepository->getAllWithPaginate(20);
        return view('admin.conversion.conversionQuantity.index', compact('records'));
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByConversion($id)
    {
        $records = $this->conversionQuantityRepository->getByWorkConversionIdPaginate($id, 20);
        return view('admin.conversion.conversionQuantity.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $conversions = $this->conversionRepository->getAllMine($this->user->id);
        $conversionTypes = $this->conversionTypeRepository->getAll();
        $conversionNamings = $this->conversionNamingRepository->getAll();

        return view('admin.conversion.conversionQuantity.create', compact('conversions', 'conversionTypes', 'conversionNamings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConversionQuantityRequest $request)
    {
        $record = $this->user->conversionQuantities()->create($request->validated());
        return redirect()->route('conversionQuantities.edit', $record->id)->with(['success' => 'Успешно добавлено!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->conversionQuantityRepository->getEditOrFail($id);
        return view('admin.conversion.conversionQuantity.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $conversions = $this->conversionRepository->getAllMine($this->user->id);
        $conversionTypes = $this->conversionTypeRepository->getAll();
        $conversionNamings = $this->conversionNamingRepository->getAll();
        $record = $this->conversionQuantityRepository->getEditOrFail($id);

        return view('admin.conversion.conversionQuantity.edit', compact('record', 'conversions', 'conversionTypes', 'conversionNamings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConversionQuantityRequest $request, int $id)
    {
        $this->conversionQuantityRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлено!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->conversionQuantityRepository->delete($id);
        return redirect()->route('conversionQuantities.index')->with(['success' => 'Успешно удалено!']);
    }
}
