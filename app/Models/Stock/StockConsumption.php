<?php

namespace App\Models\Stock;

use App\Models\Auth\User;
use App\Models\Conversion\Conversion;
use App\Models\Field\Field;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockConsumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'field_id',
        'conversion_id',
        'quantity',
        'quantity_unit',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function conversion()
    {
        return $this->belongsTo(Conversion::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
