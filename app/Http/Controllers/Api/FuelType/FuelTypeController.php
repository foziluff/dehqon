<?php

namespace App\Http\Controllers\Api\FuelType;

use App\Http\Controllers\Controller;
use App\Repositories\FuelType\FuelTypeRepository;

class FuelTypeController extends Controller
{
    private $fuelTypeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->fuelTypeRepository = app(FuelTypeRepository::class);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->fuelTypeRepository->getAllForFront();
        if ($records->isEmpty()) return response()->json(['message' => 'No content'], 204);
        return response()->json($records, 200);
    }
}

