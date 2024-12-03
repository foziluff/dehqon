<?php

namespace App\Models\Conversion\Quantity;

use App\Models\Conversion\Consumption\ConversionNaming;
use App\Models\Conversion\Consumption\ConversionType;
use App\Models\Conversion\Conversion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversionQuantity extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'conversion_id',
        'conversion_type',
        'conversion_naming',
//        'conversion_type_id',
//        'conversion_naming_id',
        'quantity',
        'quantity_unit',
    ];

    /**
     * Get the conversion type associated with the conversion quantity.
     */
    public function conversionType()
    {
        return $this->belongsTo(ConversionType::class);
    }

    /**
     * Get the conversion associated with the conversion quantity.
     */
    public function conversion()
    {
        return $this->belongsTo(Conversion::class);
    }

    /**
     * Get the conversion naming associated with the conversion quantity.
     */
    public function conversionNaming()
    {
        return $this->belongsTo(ConversionNaming::class);
    }
}
