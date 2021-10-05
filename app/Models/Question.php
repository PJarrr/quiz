<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_text', 'correct_answer', 'incorrect_answer1', 'incorrect_answer2', 'incorrect_answer3'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
