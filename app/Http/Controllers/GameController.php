<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

class GameController extends Controller
{
    public function start()
    {
        return view('game.start');
    }

    public function lobby(Request $request)
    {   
        $quiz_id = Quiz::where('title', $request->quiz_title)->value('id');
        $quiz = Quiz::where('title', $request->quiz_title)->first();
        
        return view('game.lobby', compact('quiz'));
    }


    public function play(Quiz $quiz)
    {   

        // Getting not answered questions
        $allQuestions = $quiz->questions()->get();
        $allQuizAnswers = $quiz->answers()->get();
        $answeredQuestions = collect([]);
        
        foreach ($allQuizAnswers as $answer)
        {
            
            if($answer->user_id === auth()->id()){
                $answeredQuestion = $answer->question()->first();
                $answeredQuestions->push($answeredQuestion);
            }
        }
        $unansweredQuestions = $allQuestions->diff($answeredQuestions);
        
        $question = $unansweredQuestions->first();

        //Data to view:
        $question_id = $question->id;
        $question_text = $question->question_text;
        $options = [
            $question->correct_answer,
            $question->incorrect_answer1,
            $question->incorrect_answer2,
            $question->incorrect_answer3,
        ];
        shuffle($options);

        return view('game.play', compact('quiz','question_id', 'question_text', 'options'));
        
    }
    public function submitAnswer(StoreAnswerRequest $request, Quiz $quiz)  
    {
        $answer = Answer::create([
            'user_id' => auth()->id(),
            'quiz_id'=> $quiz->id,
            'question_id'=>$request->question_id,
            'answer'=>$request->answer]);
            

            $quiz->answers()->attach(1, [
            'user_id' => auth()->id(),
            'quiz_id'=> $quiz->id,
            'answer_id'=>$answer->id] );

        return redirect()->route('game.play', compact('quiz'));
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
