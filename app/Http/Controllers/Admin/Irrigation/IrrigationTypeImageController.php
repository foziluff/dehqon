<?php

namespace App\Http\Controllers\Admin\Irrigation;

use App\Http\Controllers\Controller;
use App\Repositories\Irrigation\IrrigationTypeImageRepository;

class IrrigationTypeImageController extends Controller
{
    private $irrigationTypeImageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->irrigationTypeImageRepository = app(IrrigationTypeImageRepository::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->irrigationTypeImageRepository->delete($id);
        return redirect()->back()->with(['success' => 'Успешно удалена!']);
    }
}
