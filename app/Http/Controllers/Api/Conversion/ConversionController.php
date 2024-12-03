<?php

namespace App\Http\Controllers\Api\Conversion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Conversion\StoreConversionRequest;
use App\Http\Requests\Admin\Conversion\UpdateConversionRequest;
use App\Repositories\Conversion\ConversionRepository;

class ConversionController extends Controller
{
    private $conversionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionRepository = app(ConversionRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->conversionRepository->getAllWithPaginate(20);
        return response()->json($records, 200);
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByUser($id)
    {
        $records = $this->conversionRepository->getByUserIdPaginate($id, 20);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConversionRequest $request)
    {
        $record = $this->user->conversions()->create($request->validated());
        return response()->json($this->show($record->id)->original, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->conversionRepository->getEditOrFail($id);
        return response()->json($record, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConversionRequest $request, $id)
    {
        $record = $this->conversionRepository->update($id, $request->validated());
        return response()->json($record, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->conversionRepository->delete($id);
        return response()->json(['message' => $deleted ? 'Conversion deleted successfully' : 'Not found'], $deleted ? 200 : 404);
    }
}
