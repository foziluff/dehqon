<?php

namespace App\Http\Controllers\Api\Field\ProductQuantity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Field\ProductQuantity\StoreProductQuantityRequest;
use App\Http\Requests\Admin\Field\ProductQuantity\UpdateProductQuantityRequest;
use App\Repositories\Field\ProductQuantity\ProductQuantityRepository;
use Random\RandomException;

class ProductQuantityController extends Controller
{
    private $productQuantityRepository;

    public function __construct()
    {
        parent::__construct();
        $this->productQuantityRepository = app(ProductQuantityRepository::class);
    }

    /**
     * Display a list of product quantities filtered by field.
     * @throws RandomException
     */
    public function filterByField($id)
    {
        $records = $this->productQuantityRepository->getByFieldIdPaginate($id, 20);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created product quantity in storage.
     */
    public function store(StoreProductQuantityRequest $request)
    {
        $record = $this->user->productQuantities()->create($request->validated());
        return response()->json($record, 201);
    }

    /**
     * Display the specified product quantity.
     */
    public function show(string $id)
    {
        $record = $this->productQuantityRepository->getEditOrFail($id, $this->user->id);
        return response()->json($record, 200);
    }

    /**
     * Update the specified product quantity in storage.
     */
    public function update(UpdateProductQuantityRequest $request, $id)
    {
        $record = $this->productQuantityRepository->update($id, $request);
        return response()->json($record, 200);
    }

    /**
     * Remove the specified product quantity from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->productQuantityRepository->delete($id);
        return response()->json(['message' => $deleted ? 'Deleted successfully' : 'Not found'], $deleted ? 200 : 404);
    }
}
