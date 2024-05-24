<?php

namespace App\Http\Controllers\Admin\Field\Note;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\Note\Problem\StoreProblemRequest;
use App\Http\Requests\Admin\Field\Note\Problem\UpdateProblemRequest;
use App\Repositories\Field\Note\ProblemRepository;

class ProblemController extends Controller
{
    private $problemRepository;

    public function __construct()
    {
        parent::__construct();
        $this->problemRepository = app(ProblemRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->problemRepository->getAllWithPaginate(20);
        return view('admin.field.problem.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.field.problem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProblemRequest $request)
    {
        $record = $this->problemRepository->create($request->validated());
        return redirect()->route('problems.edit', $record->id)->with(['success' => 'Проблема успешно создана!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->problemRepository->getEditOrFail($id);
        return view('admin.field.problem.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $record = $this->problemRepository->getEditOrFail($id);
        return view('admin.field.problem.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProblemRequest $request, $id)
    {
        $this->problemRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Проблема успешно обновлена!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->problemRepository->delete($id);
        return redirect()->route('problems.index')->with(['success' => 'Проблема успешно удалена!']);
    }
}
