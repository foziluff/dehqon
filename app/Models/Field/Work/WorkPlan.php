<?php

namespace App\Models\Field\Work;

use App\Models\Field\Field;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'field_id',
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function workStages()
    {
        return $this->hasMany(WorkStage::class);
    }
}
