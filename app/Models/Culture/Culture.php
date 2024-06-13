<?php

namespace App\Models\Culture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
    ];

    public function seasons()
    {
        return $this->hasMany(CultureSeason::class);
    }
}
