<?php

namespace App\Models\Conversion\Income;

use App\Models\Auth\User;
use App\Models\Conversion\Consumption\ConversionNaming;
use App\Models\Conversion\Consumption\ConversionType;
use App\Models\Conversion\Conversion;
use App\Models\Field\ProductType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversionIncome extends Model
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

//    public function conversionType()
//    {
//        return $this->belongsTo(ConversionType::class);
//    }
//
//    public function conversionNaming()
//    {
//        return $this->belongsTo(ConversionNaming::class);
//    }
}
