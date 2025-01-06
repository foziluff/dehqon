<?php

namespace App\Models\Field;

use App\Models\Culture\Culture;
use App\Models\Field\Consumption\Consumption;
use App\Models\Field\Income\Income;
use App\Models\Field\ProductQuantity\ProductQuantity;
use App\Models\FuelType\FuelType;
use App\Models\Irrigation\Irrigation;
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
        'irrigation_id',
        'sowing_year',
        'prev_culture_id',
        'prev_sort',
        'prev_sowing_year',
        'user_id',
        'coordinates',
        'front_key',
    ];

//    protected $casts = [
//        'coordinates' => 'array',
//    ];

    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }

    public function fuelType()
    {
        return $this->belongsTo(FuelType::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function consumptions()
    {
        return $this->hasMany(Consumption::class);
    }

    public function productQuantities()
    {
        return $this->hasMany(ProductQuantity::class);
    }

    public function irrigation()
    {
        return $this->belongsTo(Irrigation::class);
    }
    public function prevCulture()
    {
        return $this->belongsTo(Culture::class, 'prev_culture_id');
    }

}
