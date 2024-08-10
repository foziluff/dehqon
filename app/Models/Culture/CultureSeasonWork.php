<?php

namespace App\Models\Culture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultureSeasonWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'work_ru',
        'work_uz',
        'work_tj',
        'culture_season_id',
    ];

    public function cultureSeason()
    {
        return $this->belongsTo(CultureSeason::class);
    }
}
