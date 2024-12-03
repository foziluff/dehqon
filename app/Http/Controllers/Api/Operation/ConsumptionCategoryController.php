<?php

namespace App\Http\Controllers\Api\Operation;

use App\Http\Controllers\Controller;
use App\Repositories\Field\Consumption\ConsumptionCategoryRepository;

class ConsumptionCategoryController extends Controller
{
    private $consumptionCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->consumptionCategoryRepository = app(ConsumptionCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $records = $this->consumptionCategoryRepository->getAll();
        return response()->json($records);
    }
}
