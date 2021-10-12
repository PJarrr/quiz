<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'quiz_id', 'question_id', 'answer'];

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    



}
