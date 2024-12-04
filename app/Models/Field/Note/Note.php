<?php

namespace App\Models\Field\Note;

use App\Models\Auth\User;
use App\Models\Field\Field;
use App\Models\Message\Message;
use App\Models\Organization\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id',
        'organization_id',
        'date',
//        'problem_id',
        'problem',
        'description',
        'defeated_area',
        'status',
        'user_seen',
        'front_key',
    ];

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
    public function images()
    {
        return $this->hasMany(NoteImage::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
