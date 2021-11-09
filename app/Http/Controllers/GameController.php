<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Answer;
use App\Jobs\Heartbeat;
use App\Jobs\StoreResult;
use App\Models\StartedQuiz;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Rules\ValidateQuizPassword;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreAnswerRequest;
use Illuminate\Support\Facades\Validator;


class GameController extends Controller
{
    public function start()
    {
        return view('game.start');
    }

    public function lobby(Request $request)

    {   
       $validator = Validator::make($request->all(),
        [
            'quiz_title' => ['required', 'exists:App\Models\Quiz,title'],
            
            'password' => ['required', 
            Rule::exists('quizzes')->where('title', $request->quiz_title)
            ]        
        ],
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        
        $quiz= Quiz::where('title', $request->quiz_title)->first();
        $password =  $request->quiz_password;
    
        $game = Game::where('user_id', auth()->id())->where('quiz_id', $quiz->id)->first();

        $finishTime = '';
        if($game)
        {  
            $finishTime=$game->created_at->add($quiz->time, 'minute');
        }
        Session::put('finishTime',$finishTime );

        return view('game.lobby', compact('quiz', 'game', 'finishTime'));
    }


    public function play(Game $game)
    {   
        $finishTime=$game->created_at->add($game->quiz->time, 'minute');
        
        // Getting not answered questions
        $allQuestions = $game->quiz->questions()->get();
        $allGameAnswers = $game->answers()->get();


        $finishTime=$game->created_at->add($game->quiz->time, 'minute');
        
        Session::put('finishTime',$finishTime );
        Session::put('game',$game );

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
            $question_img=$question->image;
            $question_text = $question->question_text;
            $options = [
                $question->correct_answer,
                $question->incorrect_answer1,
                $question->incorrect_answer2,
                $question->incorrect_answer3,
            ];
            shuffle($options);
    
            return view('game.play', compact('game','question_id', 'question_text', 'options', 'question_img'));
            
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
            //dd($game->quiz->questions);
            $game->questions()->attach($game->quiz->questions); 

            //in case a user exits quiz game without posting results manually.
            StoreResult::dispatch($game)->delay(now()->addMinutes($game->quiz->time)->addSeconds(1));
        }

        $game = Game::where('user_id', auth()->id())->where('quiz_id', $quiz_id)->first();

        return redirect()->route('game.play', compact('game'));
    }

    public function time()
    {
        $game = Session::get('game');
        return $game;
    }


}
