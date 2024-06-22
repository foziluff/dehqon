<?php

namespace App\Http\Controllers\Admin\News;

use App\Actions\NewsImagesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Repositories\News\NewsImageRepository;
use App\Repositories\News\NewsRepository;

class NewsController extends Controller
{
    private $newsRepository;
    private $newsImageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->newsImageRepository = app(NewsImageRepository::class);
        $this->newsRepository = app(NewsRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->newsRepository->getAllWithPaginate(20);
        return view('admin.news.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $record = $this->user->news()->create($request->validated());
        app(NewsImagesAction::class)->handle($request, $record->id);
        return redirect()->route('news.edit', $record->id)->with(['success' => 'Успешно добавлена!']);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->newsRepository->getEditOrFail($id);
        return view('admin.news.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->newsRepository->getEditOrFail($id);
        $images = $this->newsImageRepository->getByNewsId($record->id);
        return view('admin.news.edit', compact('record', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, int $id)
    {
        $record = $this->newsRepository->update($id, $request->validated());
        app(NewsImagesAction::class)->handle($request, $record->id);
        return redirect()->back()->with(['success' => 'Успешно обновлена!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->newsRepository->delete($id);
        return redirect()->route('news.index')->with(['success' => 'Успешно удалена!']);
    }
}
