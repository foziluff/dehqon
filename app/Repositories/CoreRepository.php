<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;

abstract class CoreRepository
{
    protected $model;
    protected $user;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
        $this->user = Auth::user();
    }

    abstract protected function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }

}
