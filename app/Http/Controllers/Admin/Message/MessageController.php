<?php
namespace App\Http\Controllers\Admin\Message;

use App\Http\Controllers\Base\Controller;
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->messageRepository->getAllWithPaginate(20);
        return view('admin.message.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.message.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $record = $this->messageRepository->create($request->validated());
        return redirect()->back()->with(['success' => 'Message successfully added!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->messageRepository->getEditOrFail($id);
        return view('admin.message.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->messageRepository->getEditOrFail($id);
        return view('admin.message.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, int $id)
    {
        $this->messageRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Message successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->messageRepository->delete($id);
        return redirect()->route('messages.index')->with(['success' => 'Message successfully deleted!']);
    }
}
