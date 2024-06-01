<?php

namespace App\Models\AgroMarket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgroMarket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'phone',
        'email',
        'site',
        'image_path',
    ];
}
