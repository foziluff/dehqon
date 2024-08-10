<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;

abstract class CoreRepository
{
    protected $model;
    protected $user;
    protected $lang;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
        $this->user = Auth::user();
        $this->lang = request()->header('Accept-Language');
    }

    abstract protected function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }

    public function transformLang($records, $langItems)
    {
        foreach ($records as $item) {
            foreach ($langItems as $langItem){
                $item->{$langItem} = $item->{$langItem . "_" . $this->lang};
                unset($item->{$langItem."_ru"}, $item->{$langItem."_uz"}, $item->{$langItem."_tj"});
            }
        }
        return $records;
    }

}
