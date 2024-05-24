<?php

namespace App\Models\Field\Note;

use App\Models\Auth\User;
use App\Models\Field\Field;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id',
        'date',
        'problem_id',
        'description',
        'defeated_area',
    ];

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
    public function images()
    {
        return $this->hasMany(NoteImage::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
