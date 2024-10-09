<?php

namespace App\Http\Controllers\Api\Field\Rotation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Field\Rotation\StoreRotationRequest;
use App\Http\Requests\Admin\Field\Rotation\UpdateRotationRequest;
use App\Repositories\Field\RotationRepository;
use Random\RandomException;

class RotationController extends Controller
{
    private $rotationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->rotationRepository = app(RotationRepository::class);
    }

    /**
     * Display a filterByUser of the resource.
     * @throws RandomException
     */
    public function filterByField($id)
    {
        $records = $this->rotationRepository->getByFieldIdMine($id, $this->user->id, 20);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRotationRequest $request)
    {
        $record = $this->user->rotations()->create($request->validated());
        return response()->json($record->load('culture'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = $this->rotationRepository->getMineEditOrFail($id, $this->user->id);
        return response()->json($record, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRotationRequest $request, $id)
    {
        $record = $this->rotationRepository->update($id, $request);
        return response()->json($record, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->rotationRepository->deleteIfMine($id, $this->user->id);
        return response()->json(['message' => $deleted ? 'Deleted successfully' : 'Not found'], $deleted ? 200 : 404);
    }
}

