<?php

namespace App\Models\Irrigation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irrigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ru',
        'title_uz',
        'title_tj',
        'image_path',
    ];



    public function irrigationTypes()
    {
        return $this->hasMany(IrrigationType::class);
    }

}
