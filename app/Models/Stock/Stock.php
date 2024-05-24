<?php

namespace App\Models\Stock;

use App\Models\Auth\User;
use App\Models\Field\Consumption\ConsumptionProductionMean;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'title',
        'consumption_production_mean_id',
        'quantity',
        'quantity_unit',
        'price',
    ];

    /**
     * Get the user that owns the stock.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the consumption production mean associated with the stock.
     */
    public function consumptionProductionMean()
    {
        return $this->belongsTo(ConsumptionProductionMean::class);
    }
}
