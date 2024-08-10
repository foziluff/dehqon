<?php

namespace App\Http\Controllers\Api\AgroCredit;

use App\Http\Controllers\Controller;
use App\Repositories\AgroCredit\AgroCreditRepository;

class AgroCreditController extends Controller
{
    private $agroCreditRepository;

    public function __construct()
    {
        parent::__construct();
        $this->agroCreditRepository = app(AgroCreditRepository::class);
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $records = $this->agroCreditRepository->getAllForFront();
        if ($records->isEmpty()) return response()->json(['message' => 'No content'], 204);
        return response()->json($records, 200);
    }
}
