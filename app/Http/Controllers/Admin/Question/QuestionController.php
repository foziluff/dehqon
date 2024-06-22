<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Question\StoreQuestionRequest;
use App\Http\Requests\Admin\Question\UpdateQuestionRequest;
use App\Repositories\Question\QuestionRepository;

class QuestionController extends Controller
{
    private $questionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->questionRepository = app(QuestionRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->questionRepository->getAllWithPaginate(20);
        return view('admin.question.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.question.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorequestionRequest $request)
    {
        $record = $this->user->questions()->create($request->validated());
        return redirect()->route('questions.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->questionRepository->getEditOrFail($id);
        return view('admin.question.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->questionRepository->getEditOrFail($id);
        return view('admin.question.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatequestionRequest $request, int $id)
    {
        $this->questionRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->questionRepository->delete($id);
        return redirect()->route('questions.index')->with(['success' => 'Успешно удален!']);
    }
}
