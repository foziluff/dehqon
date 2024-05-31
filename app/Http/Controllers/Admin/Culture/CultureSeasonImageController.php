<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Base\Controller;
use App\Repositories\Culture\CultureSeasonImageRepository;

class CultureSeasonImageController extends Controller
{
    private $cultureSeasonImageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cultureSeasonImageRepository = app(CultureSeasonImageRepository::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->cultureSeasonImageRepository->delete($id);
        return redirect()->back()->with(['success' => 'Успешно удалена!']);
    }
}
