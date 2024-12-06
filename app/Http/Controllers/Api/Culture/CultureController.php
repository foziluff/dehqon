<?php

namespace App\Http\Controllers\Api\Culture;

use App\Actions\ImageAction;
use App\Http\Controllers\Controller;
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
        $records = $this->cultureRepository->getAllWithChildrenForFront();
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCultureRequest $request)
    {
        $record = $this->cultureRepository->getByFrontId($request->front_key);
        if ($record) return response()->json($record, 201);
        $request = (new ImageAction())->handle($request);
        $record = $this->user->cultures()->create($request->only(['title_ru', 'title_uz', 'title_tj', 'image_path', 'front_key']));
        return response()->json($record, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->cultureRepository->getEditOrFailForFront($id);
        return response()->json($record, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCultureRequest $request, int $id)
    {
        $request = (new ImageAction())->handle($request);
        $this->cultureRepository->updateForFront($id, $request->only(['title_ru', 'title_uz', 'title_tj', 'image_path']));
        return response()->json(['success' => 'Успешно обновлен!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->cultureRepository->deleteForFront($id);
        return response()->json(['success' => 'Успешно удален!'], 200);
    }
}
