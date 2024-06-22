<?php
namespace App\Http\Controllers\Admin\Message;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Message\StoreMessageRequest;
use App\Repositories\Message\MessageRepository;

class MessageController extends Controller
{
    private $messageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->messageRepository = app(MessageRepository::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $message = $this->user->messages()->create($request->validated());

        broadcast(new MessageSent($message));

        if ($request->ajax()) {
            return response()->json(['message' => $message], 200);
        }

        return redirect()->back()->with(['success' => 'Сообщение успешно отправлено!']);
    }

    public function show($id)
    {
        $test = $this->messageRepository->getEditOrFail(386);
        broadcast(new MessageSent($test));
    }
}
