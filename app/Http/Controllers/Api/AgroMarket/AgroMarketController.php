<?php

namespace App\Http\Controllers\Api\AgroMarket;

use App\Http\Controllers\Controller;
use App\Repositories\AgroMarket\AgroMarketRepository;

class AgroMarketController extends Controller
{
    private $agroMarketRepository;

    public function __construct()
    {
        parent::__construct();
        $this->agroMarketRepository = app(AgroMarketRepository::class);
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $records = $this->agroMarketRepository->getAllForFront();
        return response()->json($records, 200);
    }
}
