<?php

namespace App\Http\Controllers\Base;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }
}
