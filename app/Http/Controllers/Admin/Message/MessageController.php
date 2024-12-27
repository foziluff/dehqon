<?php
namespace App\Http\Controllers\Admin\Message;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Message\StoreMessageRequest;
use App\Http\Requests\Admin\Message\UpdateMessageRequest;
use App\Repositories\Message\MessageRepository;

class MessageController extends Controller
{
    private $messageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->messageRepository = app(MessageRepository::class);
    }

    public function index(int $noteId)
    {
        $messages = $this->messageRepository->getByNoteIdWithPaginateForFront($noteId, 20);
        return response()->json($messages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $message = $this->user->messages()->create($request->validated());

        broadcast(new MessageSent($message));

        if ($request->wantsJson()) {
            return response()->json($message);
        }

        return redirect()->back()->with(['success' => 'Сообщение успешно отправлено!']);
    }

    public function show($id)
    {
        $test = $this->messageRepository->getEditOrFail(386);
        broadcast(new MessageSent($test));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, int $id)
    {
        $record = $this->messageRepository->updateIfMine($id, $request->validated());
        return response()->json($record);
    }

    public function destroy(int $id)
    {
        $this->messageRepository->deleteIfMine($id);
        return response()->json(['message' => 'Успешно удалено!']);
    }
}
