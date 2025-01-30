<?php

namespace App\Http\Controllers\Admin\ProtectiveEquipment;

use App\Actions\ImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProtectiveEquipment\StoreProtectiveEquipmentRequest;
use App\Http\Requests\Admin\ProtectiveEquipment\UpdateProtectiveEquipmentRequest;
use App\Repositories\ProtectiveEquipment\ProtectiveEquipmentRepository;

class ProtectiveEquipmentController extends Controller
{
    private $protectiveEquipment;

    public function __construct()
    {
        parent::__construct();
        $this->protectiveEquipment = app(ProtectiveEquipmentRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->protectiveEquipment->getAllWithPaginate(20);
        return view('admin.protectiveEquipment.index', compact('records'));
    }
    /**
     * Display a listing of the resource.
     */
    public function indexForFront()
    {
        $records = $this->protectiveEquipment->getAll();
        return response()->json($records);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.protectiveEquipment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProtectiveEquipmentRequest $request)
    {
        $request = (new ImageAction())->handle($request);
        $record = $this->user->protectiveEquipments()->create($request->only(['title_ru','title_uz','title_tj', 'image_path']));
        return redirect()->route('protectiveEquipments.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->protectiveEquipment->getEditOrFail($id);
        return view('admin.protectiveEquipment.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->protectiveEquipment->getEditOrFail($id);
        return view('admin.protectiveEquipment.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProtectiveEquipmentRequest $request, int $id)
    {
        $request = (new ImageAction())->handle($request);
        $this->protectiveEquipment->update($id, $request->only(['title_ru','title_uz','title_tj', 'image_path']));
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->protectiveEquipment->delete($id);
        return redirect()->route('protectiveEquipments.index')->with(['success' => 'Успешно удален!']);
    }
}
