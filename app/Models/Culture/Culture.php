<?php

namespace App\Models\Culture;

use App\Models\Auth\User;
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
        'front_key',
    ];

    public function seasons()
    {
        return $this->hasMany(CultureSeason::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
