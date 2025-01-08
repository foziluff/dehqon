<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\StoreFertilizerRequest;
use App\Http\Requests\Admin\Fertilizer\UpdateFertilizerRequest;
use App\Repositories\Fertilizer\FertilizerRepository;

class FertilizerController extends Controller
{
    private $fertilizerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->fertilizerRepository = app(FertilizerRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->fertilizerRepository->getAllWithPaginate(20);
        return view('admin.fertilizer.index', compact('records'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexForFront()
    {
        $records = $this->fertilizerRepository->getAll();
        return response()->json($records);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fertilizer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFertilizerRequest $request)
    {
        $record = $this->user->fertilizers()->create($request->validated());
        return redirect()->route('fertilizers.edit', $record->id)->with(['success' => 'Успешно добавлена!']);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->fertilizerRepository->getEditOrFail($id);
        return view('admin.fertilizer.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->fertilizerRepository->getEditOrFail($id);
        return view('admin.fertilizer.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFertilizerRequest $request, int $id)
    {
        $record = $this->fertilizerRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлена!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->fertilizerRepository->delete($id);
        return redirect()->route('fertilizers.index')->with(['success' => 'Успешно удалена!']);
    }
}
