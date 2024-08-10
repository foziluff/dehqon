<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [

        'title_ru',
        'title_uz',
        'title_tj',

        'description_ru',
        'description_uz',
        'description_tj',

        'address_ru',
        'address_uz',
        'address_tj',
        'phone',
        'email',
        'site',
        'image_path',
    ];
}
