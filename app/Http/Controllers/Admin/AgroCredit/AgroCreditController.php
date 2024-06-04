<?php

namespace App\Http\Controllers\Admin\AgroCredit;

use App\Actions\ImageAction;
use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\AgroCredit\StoreAgroCreditRequest;
use App\Http\Requests\Admin\AgroCredit\UpdateAgroCreditRequest;
use App\Repositories\AgroCredit\MessageRepository;

class AgroCreditController extends Controller
{
    private $agroCreditRepository;

    public function __construct()
    {
        parent::__construct();
        $this->agroCreditRepository = app(MessageRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->agroCreditRepository->getAllWithPaginate(20);
        return view('admin.agroCredit.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agroCredit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgroCreditRequest $request)
    {
        $request = (new ImageAction())->handle($request);
        $record = $this->user->agroCredits()->create($request->all());
        return redirect()->route('agroCredits.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->agroCreditRepository->getEditOrFail($id);
        return view('admin.agroCredit.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->agroCreditRepository->getEditOrFail($id);
        return view('admin.agroCredit.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgroCreditRequest $request, int $id)
    {
        $request = (new ImageAction())->handle($request);
        $this->agroCreditRepository->update($id, $request->all());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->agroCreditRepository->delete($id);
        return redirect()->route('agroCredits.index')->with(['success' => 'Успешно удален!']);
    }
}
