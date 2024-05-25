<?php

namespace App\Models\Conversion\Consumption;

use App\Models\Auth\User;
use App\Models\Conversion\Conversion;
use App\Models\Culture\Culture;
use App\Models\Field\Field;
use App\Models\Field\ProductType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversionConsumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'conversion_id',
        'product_type_id',
        'culture_id',
        'conversion_type_id',
        'conversion_category_id',
        'conversion_operation_id',
        'conversion_production_mean_id',
        'conversion_naming_id',
        'quantity',
        'quantity_unit',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function conversion()
    {
        return $this->belongsTo(Conversion::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }

    public function conversionType()
    {
        return $this->belongsTo(ConversionType::class);
    }

    public function conversionCategory()
    {
        return $this->belongsTo(ConversionCategory::class);
    }

    public function conversionOperation()
    {
        return $this->belongsTo(ConversionOperation::class);
    }

    public function conversionProductionMean()
    {
        return $this->belongsTo(ConversionProductionMean::class);
    }

    public function conversionNaming()
    {
        return $this->belongsTo(ConversionNaming::class);
    }
}
