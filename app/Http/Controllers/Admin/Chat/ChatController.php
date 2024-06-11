<?php

namespace App\Http\Controllers\Admin\Chat;

use App\Http\Controllers\Base\Controller;
use App\Repositories\Field\Note\NoteRepository;
use App\Repositories\Field\Note\NoteShowRepository;
use App\Repositories\Message\MessageRepository;

class ChatController extends Controller
{
    private $noteRepository;
    private $messageRepository;
    private $noteShowRepository;

    public function __construct()
    {
        parent::__construct();
        $this->noteRepository = app(NoteRepository::class);
        $this->messageRepository = app(MessageRepository::class);
        $this->noteShowRepository = app(NoteShowRepository::class);
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $records = $this->noteRepository->getAllMyChatsWithPaginate($this->user->organization_id, 20);
        return view('admin.chat.index', compact('records'));
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $messages = $this->messageRepository->getByNoteIdWithPaginate($id, 100);
        $record = $this->noteRepository->getEditOrFail2($id, $this->user->organization_id);

        $recordQuantity = $this->noteShowRepository->count($this->user->id, $record->user_id);
        $recordAccess = $this->noteShowRepository->getAccess($this->user->id, $record->user_id);

        return view('admin.chat.show', compact('record', 'messages', 'recordAccess', 'recordQuantity'));
    }
}
