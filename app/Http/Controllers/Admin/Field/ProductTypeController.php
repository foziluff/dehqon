<?php

namespace App\Http\Controllers\Admin\Field;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\ProductType\StoreProductTypeRequest;
use App\Http\Requests\Admin\Field\ProductType\UpdateProductTypeRequest;
use App\Repositories\Field\ProductTypeRepository;

class ProductTypeController extends Controller
{
    private $productTypeRepository;


    public function __construct()
    {
        parent::__construct();
        $this->productTypeRepository = app(ProductTypeRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->productTypeRepository->getAll();
        return view('admin.field.consumption.productType.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.field.consumption.productType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductTypeRequest $request)
    {
        $this->productTypeRepository->create($request->validated());
        return redirect()->route('productTypes.index')->with(['success' => 'Успешно добавлено!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->productTypeRepository->find($id);
        return view('admin.admin.field.consumption.productType.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $record = $this->productTypeRepository->find($id);
        return view('admin.field.consumption.productType.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductTypeRequest $request, $id)
    {
        $this->productTypeRepository->update($id, $request->validated());
        return redirect()->route('productTypes.index')->with(['success' => 'Успешно обновлено!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->productTypeRepository->delete($id);
        return redirect()->route('productTypes.index')->with(['success' => 'Успешно удалено!']);
    }
}
