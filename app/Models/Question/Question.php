<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_ru',
        'question_uz',
        'question_tj',
        'answer_ru',
        'answer_uz',
        'answer_tj',
    ];
}
