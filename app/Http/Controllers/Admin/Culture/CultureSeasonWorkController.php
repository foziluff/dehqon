<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\Season\Work\StoreCultureSeasonWorkRequest;
use App\Http\Requests\Admin\Culture\Season\Work\UpdateCultureSeasonWorkRequest;
use App\Repositories\Culture\CultureSeasonWorkRepository;

class CultureSeasonWorkController extends Controller
{
    private $cultureSeasonWorkRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cultureSeasonWorkRepository = app(CultureSeasonWorkRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->cultureSeasonWorkRepository->getAllWithPaginate(20);
        return view('admin.culture.cultureSeasonWork.index', compact('records'));
    }

    /**
     * Display a filterByCultureSeason of the resource.
     */
    public function filterByCultureSeason($id)
    {
        $records = $this->cultureSeasonWorkRepository->getByCultureSeasonIdPaginate($id, 20);
        return view('admin.culture.cultureSeasonWork.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.culture.cultureSeasonWork.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCultureSeasonWorkRequest $request)
    {
        $record = $this->cultureSeasonWorkRepository->create($request->validated());
        return redirect()->route('cultureSeasons.works', $record->culture_season_id)->with(['success' => 'Успешно добавлена!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->cultureSeasonWorkRepository->getEditOrFail($id);
        return view('admin.culture.cultureSeasonWork.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->cultureSeasonWorkRepository->getEditOrFail($id);
        return view('admin.culture.cultureSeasonWork.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCultureSeasonWorkRequest $request, int $id)
    {
        $record = $this->cultureSeasonWorkRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлена!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->cultureSeasonWorkRepository->delete($id);
        return redirect()->back()->with(['success' => 'Успешно удалена!']);
    }
}
