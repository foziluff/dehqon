<?php

namespace App\Http\Controllers\Api\Operation;

use App\Http\Controllers\Controller;
use App\Repositories\Field\Consumption\ConsumptionOperationRepository;

class ConsumptionOperationController extends Controller
{
    private $consumptionOperationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->consumptionOperationRepository = app(ConsumptionOperationRepository::class);
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $records = $this->consumptionOperationRepository->getAll();
        return response()->json($records);
    }
}
