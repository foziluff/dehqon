<?php

namespace App\Http\Controllers\Api\Irrigation;

use App\Http\Controllers\Controller;
use App\Repositories\Irrigation\IrrigationRepository;

class IrrigationController extends Controller
{
    private $irrigationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->irrigationRepository = app(IrrigationRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->irrigationRepository->getAllForFront();
        return response()->json($records, 200);
    }
}
