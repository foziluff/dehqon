<?php

namespace App\Http\Controllers\Admin\Field\ProductQuantity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Field\ProductQuantity\StoreProductQuantityRequest;
use App\Http\Requests\Admin\Field\ProductQuantity\UpdateProductQuantityRequest;
use App\Repositories\Culture\CultureRepository;
use App\Repositories\Field\FieldRepository;
use App\Repositories\Field\ProductQuantity\ProductQuantityRepository;
use App\Repositories\Field\ProductTypeRepository;

class ProductQuantityController extends Controller
{
    private $productQuantityRepository;
    private $productTypeRepository;
    private $fieldRepository;
    private $cultureRepository;

    public function __construct()
    {
        parent::__construct();
        $this->productQuantityRepository = app(ProductQuantityRepository::class);
        $this->productTypeRepository = app(ProductTypeRepository::class);
        $this->fieldRepository = app(FieldRepository::class);
        $this->cultureRepository = app(CultureRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->productQuantityRepository->getAllWithPaginate(20);
        return view('admin.field.productQuantity.index', compact('records'));
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByField($id)
    {
        $records = $this->productQuantityRepository->getByFieldIdPaginate($id, 20);
        return view('admin.field.productQuantity.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        $cultures = $this->cultureRepository->getAll();
        $productTypes = $this->productTypeRepository->getAll();

        return view('admin.field.productQuantity.create', compact('fields', 'cultures', 'productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductQuantityRequest $request)
    {
        $record = $this->user->productQuantities()->create($request->validated());
        return redirect()->route('productQuantities.edit', $record->id)->with(['success' => 'Успешно добавлено!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->productQuantityRepository->getEditOrFail($id);
        return view('admin.field.productQuantity.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        $cultures = $this->cultureRepository->getAll();
        $productTypes = $this->productTypeRepository->getAll();

        $record = $this->productQuantityRepository->getEditOrFail($id);
        return view('admin.field.productQuantity.edit', compact('record', 'productTypes', 'fields', 'cultures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductQuantityRequest $request, int $id)
    {
        $this->productQuantityRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлено!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->productQuantityRepository->delete($id);
        return redirect()->route('productQuantities.index')->with(['success' => 'Успешно удалено!']);
    }
}
