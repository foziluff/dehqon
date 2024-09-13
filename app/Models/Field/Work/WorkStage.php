<?php

namespace App\Models\Field\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStage extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
//        'work_id',
        'material',
        'done',
        'work',
        'work_plan_id',
        'material_quantity',
        'material_quantity_unit',
    ];

//    public function work()
//    {
//        return $this->belongsTo(Work::class);
//    }

    public function workPlan()
    {
        return $this->belongsTo(WorkPlan::class);
    }
}
