<?php

namespace App\Http\Controllers\Admin\Chat;

use App\Http\Controllers\Base\Controller;
use App\Repositories\Field\Note\NoteRepository;
use App\Repositories\Message\MessageRepository;

class ChatController extends Controller
{
    private $noteRepository;
    private $messageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->noteRepository = app(NoteRepository::class);
        $this->messageRepository = app(MessageRepository::class);
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
        $messages = $this->messageRepository->getByNoteId($id);
        $record = $this->noteRepository->getEditOrFail($id);
        return view('admin.chat.show', compact('record', 'messages'));
    }
}
