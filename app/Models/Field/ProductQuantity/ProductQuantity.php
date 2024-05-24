<?php

namespace App\Models\Field\ProductQuantity;

use App\Models\Auth\User;
use App\Models\Culture\Culture;
use App\Models\Field\Field;
use App\Models\Field\ProductType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuantity extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'field_id',
        'product_type_id',
        'culture_id',
        'quantity',
        'quantity_unit',
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
}
