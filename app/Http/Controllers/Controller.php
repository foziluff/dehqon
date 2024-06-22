<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

/**
 * @OA\Info(title="DEHQON", version="0.1")
 */
abstract class Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }
}
