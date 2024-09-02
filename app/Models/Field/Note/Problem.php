<?php

namespace App\Models\Field\Note;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru',
        'title_uz',
        'title_tj',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
