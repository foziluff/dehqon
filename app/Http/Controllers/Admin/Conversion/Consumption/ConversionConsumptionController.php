<?php

namespace App\Http\Controllers\Admin\Conversion\Consumption;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Conversion\Consumption\StoreConversionConsumptionRequest;
use App\Http\Requests\Admin\Conversion\Consumption\UpdateConversionConsumptionRequest;
use App\Repositories\Conversion\Consumption\ConversionCategoryRepository;
use App\Repositories\Conversion\Consumption\ConversionConsumptionRepository;
use App\Repositories\Conversion\Consumption\ConversionNamingRepository;
use App\Repositories\Conversion\Consumption\ConversionOperationRepository;
use App\Repositories\Conversion\Consumption\ConversionProductionMeanRepository;
use App\Repositories\Conversion\Consumption\ConversionTypeRepository;
use App\Repositories\Conversion\ConversionRepository;
use App\Repositories\Culture\CultureRepository;
use App\Repositories\Field\ProductTypeRepository;

class ConversionConsumptionController extends Controller
{
    private $conversionConsumptionRepository;
    private $conversionTypeRepository;
    private $conversionCategoryRepository;
    private $conversionOperationRepository;
    private $conversionProductionMeanRepository;
    private $conversionNamingRepository;
    private $conversionRepository;
    private $productTypeRepository;
    private $cultureRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionConsumptionRepository = app(ConversionConsumptionRepository::class);
        $this->conversionTypeRepository = app(ConversionTypeRepository::class);
        $this->conversionCategoryRepository = app(ConversionCategoryRepository::class);
        $this->conversionProductionMeanRepository = app(ConversionProductionMeanRepository::class);
        $this->conversionOperationRepository = app(ConversionOperationRepository::class);
        $this->conversionNamingRepository = app(ConversionNamingRepository::class);
        $this->conversionRepository = app(conversionRepository::class);
        $this->productTypeRepository = app(ProductTypeRepository::class);
        $this->cultureRepository = app(CultureRepository::class);
    }

    public function index()
    {
        $records = $this->conversionConsumptionRepository->getAllWithPaginate(20);
        return view('admin.conversion.consumption.index', compact('records'));
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByConversion($id)
    {
        $records = $this->conversionConsumptionRepository->getByWorkConversionIdPaginate($id, 20);
        return view('admin.conversion.consumption.index', compact('records'));
    }

    public function create()
    {
        $conversionCategories = $this->conversionCategoryRepository->getAll();
        $conversionProductionMeans = $this->conversionProductionMeanRepository->getAll();
        $conversionTypes = $this->conversionTypeRepository->getAll();
        $conversionOperations = $this->conversionOperationRepository->getAll();
        $conversionNamings = $this->conversionNamingRepository->getAll();
        $conversions = $this->conversionRepository->getAllMine($this->user->id);
        $cultures = $this->cultureRepository->getAll();
        $productTypes = $this->productTypeRepository->getAll();

        return view('admin.conversion.consumption.create', compact(
            'productTypes',
            'conversionOperations', 'conversionNamings',
            'conversions', 'cultures',
            'conversionCategories', 'conversionTypes', 'conversionProductionMeans'
        ));
    }

    public function store(StoreConversionConsumptionRequest $request)
    {
        $record = $this->user->conversionConsumptions()->create($request->validated());
        return redirect()->route('conversionConsumptions.edit', $record->id)->with(['success' => 'Успешно добавлено!']);
    }

    public function show($id)
    {
        $record = $this->conversionConsumptionRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.show', compact('record'));
    }

    public function edit(int $id)
    {
        $conversionCategories = $this->conversionCategoryRepository->getAll();
        $conversionProductionMeans = $this->conversionProductionMeanRepository->getAll();
        $conversionTypes = $this->conversionTypeRepository->getAll();
        $conversionOperations = $this->conversionOperationRepository->getAll();
        $conversionNamings = $this->conversionNamingRepository->getAll();
        $conversions = $this->conversionRepository->getAllMine($this->user->id);
        $cultures = $this->cultureRepository->getAll();
        $productTypes = $this->productTypeRepository->getAll();

        $record = $this->conversionConsumptionRepository->getEditOrFail($id);
        return view('admin.conversion.consumption.edit', compact(
            'record', 'productTypes',
            'conversionOperations', 'conversionNamings',
            'conversions', 'cultures',
            'conversionCategories', 'conversionTypes', 'conversionProductionMeans'
        ));
    }

    public function update(UpdateConversionConsumptionRequest $request, int $id)
    {
        $this->conversionConsumptionRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлено!']);
    }

    public function destroy(int $id)
    {
        $this->conversionConsumptionRepository->delete($id);
        return redirect()->route('conversionConsumptions.index')->with(['success' => 'Успешно удалено!']);
    }
}
