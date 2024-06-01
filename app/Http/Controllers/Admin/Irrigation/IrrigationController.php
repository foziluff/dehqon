<?php

namespace App\Http\Controllers\Admin\Irrigation;

use App\Actions\ImageAction;
use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Irrigation\StoreIrrigationRequest;
use App\Http\Requests\Admin\Irrigation\UpdateIrrigationRequest;
use App\Repositories\Irrigation\IrrigationRepository;

class IrrigationController extends Controller
{
    private $irrigationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->irrigationRepository = app(IrrigationRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->irrigationRepository->getAllWithPaginate(20);
        return view('admin.irrigation.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.irrigation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIrrigationRequest $request)
    {
        $request = (new ImageAction())->handle($request);
        $record = $this->user->irrigations()->create($request->only(['title', 'image_path']));
        return redirect()->route('irrigations.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->irrigationRepository->getEditOrFail($id);
        return view('admin.irrigation.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->irrigationRepository->getEditOrFail($id);
        return view('admin.irrigation.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIrrigationRequest $request, int $id)
    {
        $request = (new ImageAction())->handle($request);
        $this->irrigationRepository->update($id, $request->only(['title', 'image_path']));
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->irrigationRepository->delete($id);
        return redirect()->route('irrigations.index')->with(['success' => 'Успешно удален!']);
    }
}
