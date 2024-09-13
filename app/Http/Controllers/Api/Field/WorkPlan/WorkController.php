<?php

namespace App\Http\Controllers\Api\Field\WorkPlan;

use App\Http\Controllers\Controller;
use App\Repositories\Field\Work\WorkRepository;

class WorkController extends Controller
{
    private $workRepository;

    public function __construct()
    {
        parent::__construct();
        $this->workRepository = app(WorkRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->workRepository->getAll();
        return response()->json($records, 200);
    }

}
