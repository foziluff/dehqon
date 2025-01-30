<?php

namespace App\Models\ProtectiveEquipment;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtectiveEquipmentItem extends Model
{
    use HasFactory;

    protected $table = 'protective_equipment_items';

    protected $fillable = [
        'title_ru',
        'title_uz',
        'title_tj',
        'description_ru',
        'description_uz',
        'description_tj',
        'image_path',
        'front_key',
        'protective_equipment_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function protectiveEquipment()
    {
        return $this->belongsTo(ProtectiveEquipment::class);
    }
}
