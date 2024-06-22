<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Actions\CultureImagesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\Season\StoreCultureSeasonRequest;
use App\Http\Requests\Admin\Culture\Season\UpdateCultureSeasonRequest;
use App\Repositories\Culture\CultureRepository;
use App\Repositories\Culture\CultureSeasonImageRepository;
use App\Repositories\Culture\CultureSeasonRepository;

class CultureSeasonController extends Controller
{
    private $cultureSeasonRepository;
    private $cultureRepository;
    private $cultureSeasonImageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cultureSeasonRepository = app(CultureSeasonRepository::class);
        $this->cultureSeasonImageRepository = app(CultureSeasonImageRepository::class);
        $this->cultureRepository = app(CultureRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->cultureSeasonRepository->getAllWithPaginate(20);
        return view('admin.culture.cultureSeason.index', compact('records'));
    }

    /**
     * Display a filterByCulture of the resource.
     */
    public function filterByCulture($id)
    {
        $records = $this->cultureSeasonRepository->getByCultureIdPaginate($id, 20);
        return view('admin.culture.cultureSeason.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cultures = $this->cultureRepository->getAll();
        return view('admin.culture.cultureSeason.create', compact('cultures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCultureSeasonRequest $request)
    {
        $record = $this->cultureSeasonRepository->create($request->validated());
        app(CultureImagesAction::class)->handle($request, $record->id);
        return redirect()->route('cultureSeasons.edit', $record->id)->with(['success' => 'Успешно добавлена!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->cultureSeasonRepository->getEditOrFail($id);
        $images = $this->cultureSeasonImageRepository->getByCultureSeasonId($record->id);
        return view('admin.culture.cultureSeason.show', compact('record', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $cultures = $this->cultureRepository->getAll();
        $record = $this->cultureSeasonRepository->getEditOrFail($id);
        $images = $this->cultureSeasonImageRepository->getByCultureSeasonId($record->id);
        return view('admin.culture.cultureSeason.edit', compact('record', 'cultures', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCultureSeasonRequest $request, int $id)
    {
        $record = $this->cultureSeasonRepository->update($id, $request->validated());
        app(CultureImagesAction::class)->handle($request, $record->id);
        return redirect()->back()->with(['success' => 'Успешно обновлена!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->cultureSeasonRepository->delete($id);
        return redirect()->route('cultureSeasons.index')->with(['success' => 'Успешно удалена!']);
    }
}

