<?php

namespace App\Models\FuelType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru',
        'title_uz',
        'title_tj',
    ];
}
