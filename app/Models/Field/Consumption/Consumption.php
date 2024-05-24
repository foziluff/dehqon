<?php

namespace App\Models\Field\Consumption;

use App\Models\Auth\User;
use App\Models\Culture\Culture;
use App\Models\Field\Field;
use App\Models\Field\ProductType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'field_id',
        'product_type_id',
        'culture_id',
        'consumption_category_id',
        'consumption_operation_id',
        'consumption_production_mean_id',
        'consumption_naming_id',
        'quantity',
        'quantity_unit',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }

    public function consumptionCategory()
    {
        return $this->belongsTo(ConsumptionCategory::class);
    }

    public function consumptionOperation()
    {
        return $this->belongsTo(ConsumptionOperation::class);
    }

    public function consumptionProductionMean()
    {
        return $this->belongsTo(ConsumptionProductionMean::class);
    }

    public function consumptionNaming()
    {
        return $this->belongsTo(ConsumptionNaming::class);
    }
}
