<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
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
