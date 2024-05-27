<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Base\Controller;
use App\Repositories\News\NewsImageRepository;

class NewsImageController extends Controller
{
    private $newsImageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->newsImageRepository = app(NewsImageRepository::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->newsImageRepository->delete($id);
        return redirect()->back()->with(['success' => 'Успешно удалена!']);
    }
}
