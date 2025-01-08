<?php

namespace App\Models\ProtectiveEquipment;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtectiveEquipment extends Model
{
    use HasFactory;

    protected $table = 'protective_equipments';

    protected $fillable = [
        'title_ru',
        'title_uz',
        'title_tj',
        'image_path',
        'front_key',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
