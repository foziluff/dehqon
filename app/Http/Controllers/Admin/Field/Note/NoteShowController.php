<?php

namespace App\Http\Controllers\Admin\Field\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Field\Note\NoteShow\StoreNoteShowRequest;
use App\Http\Requests\Admin\Field\Note\NoteShow\UpdateNoteShowRequest;
use App\Repositories\Field\Note\NoteShowRepository;

class NoteShowController extends  Controller
{
    private $noteShowRepository;

    public function __construct()
    {
        parent::__construct();
        $this->noteShowRepository = app(NoteShowRepository::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteShowRequest $request)
    {
        $recordQuantity = $this->noteShowRepository->count($this->user->id, $request->asked_for_user_id);
        if ($recordQuantity > 0) return redirect()->back()->withErrors(['errors' => ['error' => 'Уже отправлена!']]);
        $this->noteShowRepository->create($request->only('asking_user_id', 'asked_for_user_id'));
        return redirect()->back()->with(['success' => 'Успешно отправлена!']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteShowRequest $request, int $id)
    {
        $noteShow = $this->noteShowRepository->getEditOrFail($id);

        if ($this->user->id == $noteShow->asked_for_user_id)
        {
            $this->noteShowRepository->update($id, $request->only('access'));
            return redirect()->back()->with(['success' => 'Успешно одобрено!']);
        }
        abort(403);
    }

}
