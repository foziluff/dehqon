<?php

namespace App\Models\Irrigation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IrrigationTypeImage extends Model
{
    use HasFactory;

    protected $fillable = ['image_path', 'irrigation_type_id'];
}
