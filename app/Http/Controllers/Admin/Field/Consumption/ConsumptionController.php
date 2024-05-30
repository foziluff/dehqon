<?php

namespace App\Http\Controllers\Admin\Field\Consumption;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\Consumption\StoreConsumptionRequest;
use App\Http\Requests\Admin\Field\Consumption\UpdateConsumptionRequest;
use App\Repositories\Culture\CultureRepository;
use App\Repositories\Field\Consumption\ConsumptionCategoryRepository;
use App\Repositories\Field\Consumption\ConsumptionNamingRepository;
use App\Repositories\Field\Consumption\ConsumptionOperationRepository;
use App\Repositories\Field\Consumption\ConsumptionProductionMeanRepository;
use App\Repositories\Field\Consumption\ConsumptionRepository;
use App\Repositories\Field\FieldRepository;
use App\Repositories\Field\ProductTypeRepository;

class ConsumptionController extends Controller
{
    private $consumptionRepository;
    private $consumptionCategoryRepository;
    private $consumptionNamingRepository;
    private $consumptionOperationRepository;
    private $consumptionProductionMeanRepository;
    private $productTypeRepository;
    private $fieldRepository;
    private $cultureRepository;

    public function __construct()
    {
        parent::__construct();
        $this->consumptionRepository = app(ConsumptionRepository::class);
        $this->consumptionCategoryRepository = app(ConsumptionCategoryRepository::class);
        $this->consumptionNamingRepository = app(ConsumptionNamingRepository::class);
        $this->consumptionOperationRepository = app(ConsumptionOperationRepository::class);
        $this->consumptionProductionMeanRepository = app(ConsumptionProductionMeanRepository::class);
        $this->productTypeRepository = app(ProductTypeRepository::class);
        $this->fieldRepository = app(FieldRepository::class);
        $this->cultureRepository = app(CultureRepository::class);
    }

    public function index()
    {
        $records = $this->consumptionRepository->getAllWithPaginate(20);
        return view('admin.field.consumption.index', compact('records'));
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByField($id)
    {
        $records = $this->consumptionRepository->getByFieldIdPaginate($id, 20);
        return view('admin.field.consumption.index', compact('records'));
    }

    public function create()
    {
        $consumptionCategories = $this->consumptionCategoryRepository->getAll();
        $consumptionNamings = $this->consumptionNamingRepository->getAll();
        $consumptionOperations = $this->consumptionOperationRepository->getAll();
        $consumptionProductionMeans = $this->consumptionProductionMeanRepository->getAll();
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        $cultures = $this->cultureRepository->getAll();
        $productTypes = $this->productTypeRepository->getAll();

        return view('admin.field.consumption.create', compact('consumptionCategories', 'consumptionNamings', 'consumptionOperations', 'consumptionProductionMeans', 'fields', 'cultures', 'productTypes'));
    }


    public function store(StoreConsumptionRequest $request)
    {
        $record = $this->user->consumptions()->create($request->validated());
        return redirect()->route('consumptions.edit', $record->id)->with(['success' => 'Успешно добавлено!']);
    }

    public function show($id)
    {
        $record = $this->consumptionRepository->getEditOrFail($id);
        return view('admin.field.consumption.show', compact('record'));
    }

    public function edit(int $id)
    {
        $consumptionCategories = $this->consumptionCategoryRepository->getAll();
        $consumptionNamings = $this->consumptionNamingRepository->getAll();
        $consumptionOperations = $this->consumptionOperationRepository->getAll();
        $consumptionProductionMeans = $this->consumptionProductionMeanRepository->getAll();
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        $cultures = $this->cultureRepository->getAll();
        $productTypes = $this->productTypeRepository->getAll();

        $record = $this->consumptionRepository->getEditOrFail($id);
        return view('admin.field.consumption.edit', compact('record', 'productTypes', 'consumptionCategories', 'consumptionNamings', 'consumptionOperations', 'consumptionProductionMeans', 'fields', 'cultures'));
    }


    public function update(UpdateConsumptionRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $this->consumptionRepository->update($id, $validatedData);
        return redirect()->back()->with(['success' => 'Успешно обновлено!']);
    }

    public function destroy(int $id)
    {
        $this->consumptionRepository->delete($id);
        return redirect()->route('consumptions.index')->with(['success' => 'Успешно удалено!']);
    }
}
