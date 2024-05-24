<?php

namespace App\Models\Field\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStage extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'work_id',
        'material',
        'material_quantity',
        'material_quantity_unit',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
