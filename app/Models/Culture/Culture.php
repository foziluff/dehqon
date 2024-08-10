<?php

namespace App\Models\Culture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru',
        'title_uz',
        'title_tj',
        'image_path',
    ];

    public function seasons()
    {
        return $this->hasMany(CultureSeason::class);
    }
}
