<?php

namespace App\Http\Controllers\Admin\Field\Note;

use App\Http\Controllers\Controller;
use App\Repositories\Field\Note\NoteImageRepository;

class NoteImageController extends Controller
{
    private $noteImageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->noteImageRepository = app(NoteImageRepository::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->noteImageRepository->delete($id);
        return redirect()->back()->with(['success' => 'Успешно удалена!']);
    }
}
