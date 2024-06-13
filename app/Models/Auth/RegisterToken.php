<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterToken extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'token'];
}
