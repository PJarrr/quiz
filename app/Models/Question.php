<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'question_text', 'correct_answer', 'incorrect_answer1', 'incorrect_answer2', 'incorrect_answer3', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
