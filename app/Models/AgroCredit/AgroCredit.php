<?php

namespace App\Models\AgroCredit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgroCredit extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'address',
        'phone',
        'email',
        'site',
        'image_path',
    ];

}
