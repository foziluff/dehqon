<?php

namespace App\Models\Field;

use App\Models\Auth\User;
use App\Models\Culture\Culture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id',
        'culture_id',
        'culture_sort',
        'user_id',
        'sowing_date',
        'harvesting_date',
        'average_yield',
        'average_yield_unit',
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
