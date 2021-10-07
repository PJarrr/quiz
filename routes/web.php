<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('quizzes', QuizController::class);
    Route::resource('questions', QuestionController::class);
    
});

Route::group(['prefix' => 'game', 'middleware' => ['auth']], function(){
    Route::get('', [GameController::class, 'start'])->name('game.start');
    Route::post('lobby', [GameController::class, 'lobby'])->name('game.lobby');
    Route::get('play/{quiz}', [GameController::class, 'play'])->name('game.play');
    Route::post('submit-answer/{quiz}', [GameController::class, 'submitAnswer'])->name('game.submitAnswer');
    //Route::post('game', [PlayController::class, 'game'])->name('play.game');
    //Route::post('submit-answer', [PlayController::class, 'submitAnswer'])->name('play.submitAnswer');
    // Route::get('results', [GameController::class, 'quizResults'])->name('quiz.results');
    // Route::post('ans', [GameController::class, 'answering'])->name('quiz.answering');
    // Route::post('submitanswer', [GameController::class, 'submitAnswer'])->name('quiz.submitAnswer');
});