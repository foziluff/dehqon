<?php

namespace App\Models\Conversion\Consumption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversionOperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
}
