<?php

namespace App\Models\Field\Consumption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumptionNaming extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
}
