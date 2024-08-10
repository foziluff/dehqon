<?php

namespace App\Http\Controllers\Api\Organization;

use App\Http\Controllers\Controller;
use App\Repositories\Organization\OrganizationRepository;

class OrganizationController extends Controller
{
    private $organizationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->organizationRepository = app(OrganizationRepository::class);
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $records = $this->organizationRepository->getAllForFront();
        if ($records->isEmpty()) return response()->json(['message' => 'No content'], 204);
        return response()->json($records, 200);
    }
}
