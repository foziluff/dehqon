<?php

namespace App\Models\Irrigation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irrigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
    ];
}
