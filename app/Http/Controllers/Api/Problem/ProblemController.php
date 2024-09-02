<?php

namespace App\Http\Controllers\Api\Problem;

use App\Http\Controllers\Controller;
use App\Repositories\Field\Note\ProblemRepository;

class ProblemController extends Controller
{
    private $problemRepository;

    public function __construct()
    {
        parent::__construct();
        $this->problemRepository = app(ProblemRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->problemRepository->getAllForFront();
        return response()->json($records, 200);
    }
}
