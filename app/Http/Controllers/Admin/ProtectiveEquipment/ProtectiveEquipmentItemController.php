<?php

namespace App\Http\Controllers\Admin\ProtectiveEquipment;

use App\Actions\ImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProtectiveEquipment\StoreProtectiveEquipmentItemRequest;
use App\Http\Requests\Admin\ProtectiveEquipment\UpdateProtectiveEquipmentItemRequest;
use App\Repositories\ProtectiveEquipment\ProtectiveEquipmentItemRepository;
use App\Repositories\ProtectiveEquipment\ProtectiveEquipmentRepository;

class ProtectiveEquipmentItemController extends Controller
{
    private $protectiveEquipmentItem;
    private $protectiveEquipment;

    public function __construct()
    {
        parent::__construct();
        $this->protectiveEquipmentItem = app(ProtectiveEquipmentItemRepository::class);
        $this->protectiveEquipment = app(ProtectiveEquipmentRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->protectiveEquipmentItem->getAllWithPaginate(20);
        return view('admin.protectiveEquipment.protectiveEquipmentItem.index', compact('records'));
    }

    /**
     * Display a filterByCulture of the resource.
     */
    public function filterBy($id)
    {
        $records = $this->protectiveEquipmentItem->getByProtectiveEquipmentIdPaginate($id, 20);
        return view('admin.protectiveEquipment.protectiveEquipmentItem.index', compact('records'));
    }

    /**
     * Display a filterByCulture of the resource.
     */
    public function filterByForFront($id)
    {
        $records = $this->protectiveEquipmentItem->getByProtectiveEquipmentId($id);
        return response()->json($records);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $protectiveEquipments = $this->protectiveEquipment->getAll();
        return view('admin.protectiveEquipment.protectiveEquipmentItem.create', compact('protectiveEquipments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProtectiveEquipmentItemRequest $request)
    {
        $request = (new ImageAction())->handle($request);
        $record = $this->user->protectiveEquipmentItems()->create($request->only(['title_ru','title_uz','title_tj', 'description_ru','description_uz','description_tj', 'image_path', 'protective_equipment_id']));
        return redirect()->route('protectiveEquipmentItems.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->protectiveEquipmentItem->getEditOrFail($id);
        return view('admin.protectiveEquipment.protectiveEquipmentItem.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->protectiveEquipmentItem->getEditOrFail($id);
        return view('admin.protectiveEquipment.protectiveEquipmentItem.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProtectiveEquipmentItemRequest $request, int $id)
    {
        $request = (new ImageAction())->handle($request);
        $this->protectiveEquipmentItem->update($id, $request->only(['title_ru','title_uz','title_tj', 'description_ru','description_uz','description_tj', 'image_path']));
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->protectiveEquipmentItem->delete($id);
        return redirect()->route('protectiveEquipmentItems.index')->with(['success' => 'Успешно удален!']);
    }
}
