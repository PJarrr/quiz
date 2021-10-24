<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

       // $allQuestions = $user->gamesQestions()->count();
        
        $userQuizzes = Quiz::where('user_id', $user->id)->paginate(3);

        $userGames = $user->games;

        
        $totalAnsweredQuestions = $user->gamesQestions()->count();
        
    
        return view('home', compact('user', 'userQuizzes', 'totalAnsweredQuestions'));
    }
}
