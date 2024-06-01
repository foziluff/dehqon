<?php

namespace App\Models\Irrigation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IrrigationType extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'irrigation_id',
        'description',
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
