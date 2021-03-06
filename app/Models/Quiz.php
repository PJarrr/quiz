<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'title', 'password', 'description', 'time']; 


    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  

    public function answers()
    {
        return $this->belongsToMany(Answer::class);
    }


    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function results()
    {
        return $this->hasManyThrough(Result::class, Game::class);
    }
}
