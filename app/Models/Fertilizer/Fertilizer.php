<?php

namespace App\Models\Fertilizer;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru',
        'title_uz',
        'title_tj',
        'description_ru',
        'description_uz',
        'description_tj',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
