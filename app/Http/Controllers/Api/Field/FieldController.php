<?php

namespace App\Http\Controllers\Api\Field;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Field\StoreFieldRequest;
use App\Http\Requests\Admin\Field\UpdateFieldRequest;
use App\Repositories\Field\FieldRepository;

class FieldController extends Controller
{
    private $fieldRepository;

    public function __construct()
    {
        parent::__construct();
        $this->fieldRepository = app(FieldRepository::class);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->fieldRepository->getAllMineWithPaginate($this->user->id, 20);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFieldRequest $request)
    {
        $record = $this->user->fields()->create($request->validated());
        return response()->json($record, 201);
    }
    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $record = $this->fieldRepository->getOnlyMineWithChildrenOrFail($id);
        return response()->json($record, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFieldRequest $request, $id)
    {
        $record = $this->fieldRepository->update($id, $request->validated());
        return response()->json($record, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->fieldRepository->deleteIfMine($id, $this->user->id);
        return response()->json(['message' => $deleted ? 'Field deleted successfully' : 'Not found'], $deleted ? 200 : 404);
    }
}

