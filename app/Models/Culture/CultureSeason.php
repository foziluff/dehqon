<?php

namespace App\Models\Culture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultureSeason extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'culture_id',
    ];

    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }

    public function images()
    {
        return $this->hasMany(CultureSeasonImage::class);
    }

    public function works()
    {
        return $this->hasMany(CultureSeasonWork::class);
    }
}
