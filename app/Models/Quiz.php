<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'title', 'password', 'description']; 


    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  

    public function answers()
    {
        return $this->belongsToMany(Answer::class);
    }
}
