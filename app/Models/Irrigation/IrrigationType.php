<?php

namespace App\Models\Irrigation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IrrigationType extends Model
{
    use HasFactory;
    protected $fillable = [
        'irrigation_id',
        'title_ru',
        'title_uz',
        'title_tj',
        'description_ru',
        'description_uz',
        'description_tj',
    ];

    public function irrigation()
    {
        return $this->belongsTo(Irrigation::class);
    }

    public function images()
    {
        return $this->hasMany(IrrigationTypeImage::class);
    }

}
