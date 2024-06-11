<?php

namespace App\Models\Field\Note;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteShow extends Model
{
    use HasFactory;

    protected $fillable = [
        'access',
        'asked_for_user_id',
        'asking_user_id',
    ];

    public function askedForUser()
    {
        return $this->belongsTo(User::class, 'asked_for_user_id');
    }

    public function askingUser()
    {
        return $this->belongsTo(User::class, 'asking_user_id');
    }
}
