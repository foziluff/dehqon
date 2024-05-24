<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Culture\StoreCultureRequest;
use App\Http\Requests\Admin\Culture\UpdateCultureRequest;
use App\Repositories\Culture\CultureRepository;

class CultureController extends Controller
{
    private $cultureRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cultureRepository = app(CultureRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->cultureRepository->getAllWithPaginate(20);
        return view('admin.culture.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.culture.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCultureRequest $request)
    {
        $record = $this->user->cultures()->create($request->validated());
        return redirect()->route('cultures.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->cultureRepository->getEditOrFail($id);
        return view('admin.culture.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->cultureRepository->getEditOrFail($id);
        return view('admin.culture.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCultureRequest $request, int $id)
    {
        $this->cultureRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->cultureRepository->delete($id);
        return redirect()->route('cultures.index')->with(['success' => 'Успешно удален!']);
    }
}
