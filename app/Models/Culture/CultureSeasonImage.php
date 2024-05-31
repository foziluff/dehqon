<?php

namespace App\Models\Culture;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultureSeasonImage extends Model
{
    use HasFactory;

    protected $fillable = ['image_path', 'culture_season_id'];
}
