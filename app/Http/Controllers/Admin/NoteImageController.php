<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Controller;
use App\Repositories\NoteImageRepository;

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
