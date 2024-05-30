<?php

namespace App\Http\Controllers\Admin\Field\Note;

use App\Actions\NoteImagesAction;
use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\Note\StoreNoteRequest;
use App\Http\Requests\Admin\Field\Note\UpdateNoteRequest;
use App\Repositories\Field\FieldRepository;
use App\Repositories\Field\Note\NoteImageRepository;
use App\Repositories\Field\Note\NoteRepository;
use App\Repositories\Field\Note\ProblemRepository;

class NoteController extends Controller
{
    private $noteRepository;
    private $noteImageRepository;
    private $problemRepository;
    private $fieldRepository;

    public function __construct()
    {
        parent::__construct();
        $this->noteImageRepository = app(NoteImageRepository::class);
        $this->noteRepository = app(NoteRepository::class);
        $this->problemRepository = app(ProblemRepository::class);
        $this->fieldRepository = app(FieldRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->noteRepository->getAllWithPaginate(20);
        return view('admin.field.note.index', compact('records'));
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByField($id)
    {
        $records = $this->noteRepository->getByFieldIdPaginate($id, 20);
        return view('admin.field.note.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $problems = $this->problemRepository->getAll();
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        return view('admin.field.note.create', compact('problems', 'fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $record = $this->user->notes()->create($request->validated());
        app(NoteImagesAction::class)->handle($request, $record->id);
        return redirect()->route('notes.edit', $record->id)->with(['success' => 'Успешно добавлена!']);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->noteRepository->getEditOrFail($id);
        return view('admin.field.note.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $problems = $this->problemRepository->getAll();
        $fields = $this->fieldRepository->getAll();
        $record = $this->noteRepository->getEditOrFail($id);
        $images = $this->noteImageRepository->getByNoteId($record->id);
        return view('admin.field.note.edit', compact('record', 'problems', 'fields', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, int $id)
    {
        $record = $this->noteRepository->update($id, $request->validated());
        app(NoteImagesAction::class)->handle($request, $record->id);
        return redirect()->back()->with(['success' => 'Успешно обновлена!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->noteRepository->delete($id);
        return redirect()->route('notes.index')->with(['success' => 'Успешно удалена!']);
    }
}
