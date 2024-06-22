<?php

namespace App\Http\Controllers\Admin\AgroMarket;

use App\Actions\ImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AgroMarket\StoreAgroMarketRequest;
use App\Http\Requests\Admin\AgroMarket\UpdateAgroMarketRequest;
use App\Repositories\AgroMarket\AgroMarketRepository;

class AgroMarketController extends Controller
{
    private $agroMarketRepository;

    public function __construct()
    {
        parent::__construct();
        $this->agroMarketRepository = app(AgroMarketRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->agroMarketRepository->getAllWithPaginate(20);
        return view('admin.agroMarket.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agroMarket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgroMarketRequest $request)
    {
        $request = (new ImageAction())->handle($request);
        $record = $this->user->agroMarkets()->create($request->all());
        return redirect()->route('agroMarkets.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->agroMarketRepository->getEditOrFail($id);
        return view('admin.agroMarket.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->agroMarketRepository->getEditOrFail($id);
        return view('admin.agroMarket.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgroMarketRequest $request, int $id)
    {
        $request = (new ImageAction())->handle($request);
        $this->agroMarketRepository->update($id, $request->all());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->agroMarketRepository->delete($id);
        return redirect()->route('agroMarkets.index')->with(['success' => 'Успешно удален!']);
    }
}
