<?php

namespace App\Http\Controllers\Admin\Conversion;

use App\Http\Controllers\Base\Controller;
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
        return view('admin.conversion.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.conversion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConversionRequest $request)
    {
        $record = $this->user->conversions()->create($request->validated());
        return redirect()->route('conversions.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->conversionRepository->getEditOrFail($id);
        return view('admin.conversion.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->conversionRepository->getEditOrFail($id);
        return view('admin.conversion.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConversionRequest $request, int $id)
    {
        $this->conversionRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->conversionRepository->delete($id);
        return redirect()->route('conversions.index')->with(['success' => 'Успешно удален!']);
    }
}
