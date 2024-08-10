<?php

namespace App\Models\AgroMarket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgroMarket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru',
        'title_uz',
        'title_tj',

        'address_ru',
        'address_uz',
        'address_tj',
        'phone',
        'email',
        'site',
        'image_path',
    ];
}
