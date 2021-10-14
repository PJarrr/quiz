<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

        protected $fillable =['user_id', 'quiz_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function answers()
    {
        return $this->belongsToMany(Answer::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
