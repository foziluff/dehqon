<?php

namespace App\Http\Controllers\Api\Field\Income;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Field\Income\StoreIncomeRequest;
use App\Http\Requests\Admin\Field\Income\UpdateIncomeRequest;
use App\Repositories\Field\Income\IncomeRepository;
use Random\RandomException;

class IncomeController extends Controller
{
    private $incomeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->incomeRepository = app(IncomeRepository::class);
    }

    /**
     * Display a filterByUser of the resource.
     * @throws RandomException
     */
    public function filterByField($id)
    {
        $records = $this->incomeRepository->getByFieldIdMine($id, $this->user->id);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request)
    {
        $record = $this->user->incomes()->create($request->validated());
        return response()->json($record->load('culture'), 201);
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $record = $this->incomeRepository->getMineEditOrFail($id, $this->user->id);
        return response()->json($record, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, $id)
    {
        $record = $this->incomeRepository->update($id, $request->validated());
        return response()->json($record, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->incomeRepository->deleteIfMine($id, $this->user->id);
        return response()->json(['message' => $deleted ? 'Deleted successfully' : 'Not found'], $deleted ? 200 : 404);
    }
}

