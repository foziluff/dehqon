<?php

namespace App\Http\Controllers\Api\Culture;

use App\Http\Controllers\Controller;
use App\Repositories\Culture\CultureRepository;

class CultureController extends Controller
{
    private $cultureRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cultureRepository = app(CultureRepository::class);
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $records = $this->cultureRepository->getAllWithChildren();
        if ($records->isEmpty()) return response()->json(['message' => 'No content'], 204);

        return response()->json($records, 200);
    }
}
