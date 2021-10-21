<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function games()
    {
        return $this->hasMany(Question::class);
    }
    public function startedQuizzes()
    {
        return $this->hasMany(StartedQuiz::class);
    }
    public function results()
    {
        return $this->hasManyThrough(Result::class, Game::class);
    }




}
