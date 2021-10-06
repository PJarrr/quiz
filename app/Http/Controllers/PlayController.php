<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Quiz;
use App\Models\User;
use App\Models\StartedQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PlayController extends Controller
{
    public function index()
    {
        return view('play.start');
    }


    public function game(Request $request)
    {   
       
        $quiz_id = Quiz::where('title', $request->quiz_title)->value('id');
        
        if($this->quizWasPlayedBefore($quiz_id))
        {
            return redirect()->route('play.start')->with('info_message', 'You already took this quiz');
        }



            


        //$this->startedQuiz($quiz_id);

        //$quiz_questions = Quiz::find($quiz_id)->questions()->pluck('question_id');

        $startedQuizzes = User::find(auth()->id())->startedQuizzes()->get()->contains($quiz_id);
        
        dd($startedQuizzes);

    
        
        
        
        
        dump($quiz_questions);
        return view('play.game');
    }
    
 


    public function startedQuiz($quiz_id)  
    {
        $quiz = StartedQuiz::create(['user_id' => auth()->id(), 'quiz_id'=>$quiz_id ]); 
    }

    
    public function quizWasPlayedBefore($quiz_id)
    {
        return User::find(auth()->id())->startedQuizzes()->get()->contains($quiz_id); 
    }


    public function notAnsweredQuestions($quiz_id)
    {   
        
    }

}
