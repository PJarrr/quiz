<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\GameResultController;

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

//Quiz and Question CRUD routes
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('quizzes', QuizController::class);
    Route::resource('questions', QuestionController::class);
    
});

//Game logic routes
Route::group([ 'middleware' => ['auth']], function(){
    Route::get('game/', [GameController::class, 'start'])->name('game.start');
    Route::post('game/lobby', [GameController::class, 'lobby'])->name('game.lobby');
    Route::post('game/store', [GameController::class, 'store'])->name('game.store');
    Route::get('game/play/{game}', [GameController::class, 'play'])->name('game.play');
    Route::post('game/submit-answer/{game}', [GameController::class, 'submitAnswer'])->name('game.submitAnswer');
    
    //nested binded game.result routes used only to store result after the game is finished & show result of particular game
    Route::any('game.results.store/{game}', [GameResultController::class, 'store'])->name('store-result');
    Route::resource('game.results', GameResultController::class);
});

//Result route used to show all results (index).
Route::group([ 'middleware' => ['auth']], function(){
    Route::resource('results', ResultController::class);
});
