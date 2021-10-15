<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Answer;
use App\Models\StartedQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Controllers\GameController;

class GameController extends Controller
{
    public function start()
    {
        return view('game.start');
    }

    public function lobby(Request $request)
    {   
        //check if user plays this quiz for the first time
        $quiz= Quiz::where('title', $request->quiz_title)->first();

        $game = Game::where('user_id', auth()->id())->where('quiz_id', $quiz->id)->first();
        
        return view('game.lobby', compact('quiz', 'game'));
    }


    public function play(Game $game)
    {   
       
        // Getting not answered questions
        $allQuestions = $game->quiz->questions()->get();
        $allGameAnswers = $game->answers()->get();

        $answeredQuestions = collect([]);

        foreach ($allGameAnswers as $answer)
        {
                $answeredQuestion = $answer->question()->first();

                $answeredQuestions->push($answeredQuestion);
        }
        $unansweredQuestions = $allQuestions->diff($answeredQuestions);
        
        if ($unansweredQuestions->count()) //sending not answered question to view for answering
        {
            $question = $unansweredQuestions->first();
            $question_id = $question->id;
            $question_text = $question->question_text;
            $options = [
                $question->correct_answer,
                $question->incorrect_answer1,
                $question->incorrect_answer2,
                $question->incorrect_answer3,
            ];
            shuffle($options);
    
            return view('game.play', compact('game','question_id', 'question_text', 'options'));
            
        } else { //if no unanswered questions left - show results

           return redirect()->route('store-result', compact('game'));
        }
        

        


       
    }
    public function submitAnswer(StoreAnswerRequest $request, Game $game)  
    {
       
        
        $answer = Answer::create([
            'user_id' => auth()->id(),
            'game_id'=> $game->id,
            'question_id'=>$request->question_id,
            'answer'=>$request->answer]);
            


            $game->answers()->attach(1, [
            'user_id' => auth()->id(),
            'game_id'=> $game->id,
            'answer_id'=>$answer->id] );

        return redirect()->route('game.play', compact('game'));
    }


    public function store(Request $request)  
    {
        $quiz_id = $request->quiz_id;

        $game = Game::where('user_id', auth()->id())->where('quiz_id', $quiz_id)->get();

        if (!$game->count())
        {
            $game = Game::create(['user_id' => auth()->id(), 'quiz_id'=>$quiz_id ]); 
        }

        $game = Game::where('user_id', auth()->id())->where('quiz_id', $quiz_id)->first();

        return redirect()->route('game.play', compact('game'));
    }

    
    public function quizWasPlayedBefore($quiz_id)
    {
        return User::find(auth()->id())->startedQuizzes()->get()->contains($quiz_id); 
    }


    public function notAnsweredQuestions($quiz_id)
    {   
        
    }

    // public function calculateGameResult($game)
    // {
    //     $totalQuestionsCount = $game->quiz->questions->count();
    //     $allAnswers = $allGameAnswers = $game->answers()->get();
    //     $correctAnswers= 0;

    //     foreach ($allAnswers as $answer){
    //         if( $answer->answer === $answer->question()->first()->correct_answer)
    //         {
    //             $correctAnswers++;
    //         }
    //     }

    //     return redirect()->route('game.results.store', compact('game'));
        
    // }


}
