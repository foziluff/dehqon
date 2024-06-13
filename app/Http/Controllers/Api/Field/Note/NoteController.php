<?php

namespace App\Http\Controllers\Api\Field\Note;

use App\Actions\NoteImagesAction;
use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\Note\StoreNoteRequest;
use App\Http\Requests\Admin\Field\Note\UpdateNoteRequest;
use App\Repositories\Field\Note\NoteImageRepository;
use App\Repositories\Field\Note\NoteRepository;

class NoteController extends Controller
{
    private $noteRepository;
    private $noteImageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->noteRepository = app(NoteRepository::class);
        $this->noteImageRepository = app(NoteImageRepository::class);
    }

    /**
     * Display a filterByUser of the resource.
     */
    public function filterByField($id)
    {
        $records = $this->noteRepository->getByFieldIdMine($id, $this->user->id);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $record = $this->user->notes()->create($request->validated());
        app(NoteImagesAction::class)->handle($request, $record->id);
        $record = $this->noteRepository->getMineEditOrFail($record->id, $this->user->id);
        return response()->json($record, 201);
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $record = $this->noteRepository->getMineEditOrFail($id, $this->user->id);
        return response()->json($record, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, $id)
    {
        $record = $this->noteRepository->update($id, $request);
        return response()->json($record, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->noteRepository->deleteIfMine($id, $this->user->id);
        return response()->json(['message' => $deleted ? 'Note deleted successfully' : 'Not found'], $deleted ? 200 : 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyImage($id)
    {
        $noteImage = $this->noteImageRepository->getEditOrFail($id);
        $note = $this->noteRepository->getEditOrFail($noteImage->note_id);
        $deleted = $this->noteImageRepository->deleteIfMine($id, $this->user->id, $note->user_id);
        return response()->json(['message' => $deleted ? 'Image deleted successfully' : 'Not found'], $deleted ? 200 : 404);
    }
}

