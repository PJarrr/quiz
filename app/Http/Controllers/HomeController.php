<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

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
        $user = auth()->user();
        $userQuizzes = Quiz::where('user_id', $user->id)->paginate(3);

        $userGames = $user->games;

        $gameQuestionsCount = 0;
        foreach ($user->games as $game)
        {
            $gameQuestionsCount += $game->questions()->count();
        }
        
    
        return view('home', compact('user', 'userQuizzes', 'gameQuestionsCount'));
    }
}
