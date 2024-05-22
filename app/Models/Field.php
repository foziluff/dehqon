<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'culture_id',
        'sort',
        'area',
        'fuel_type_id',
        'sowing_year',
        'prev_culture_id',
        'prev_sort',
        'prev_sowing_year',
        'user_id',
        'coordinates',
    ];

    protected $casts = [
        'coordinates' => 'array',
    ];

    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }

    public function fuelType()
    {
        return $this->belongsTo(FuelType::class);
    }
    public function prevCulture()
    {
        return $this->belongsTo(Culture::class, 'prev_culture_id');
    }

}
