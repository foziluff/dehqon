<?php

namespace App\Models\Conversion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
    ];
}
