<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Result;

class GameResultController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Game $game)
    {
        //check if it is first time when submiting result for this game
        if (!Result::all()->contains($game->result()->first()))
        {
            $totalQuestionsCount = $game->quiz->questions->count();
            $allAnswers = $allGameAnswers = $game->answers()->get();
            $correctAnswers= 0;

            foreach ($allAnswers as $answer){
                if( $answer->answer === $answer->question()->first()->correct_answer)
                {
                    $correctAnswers++;
                }
            }
            //if its first time -store result
            $result=Result::create(['game_id'=>$game->id, 'correct_answers'=>$correctAnswers]);
        }

        $result = $game->result()->first();

        return redirect()->route('game.results.show', compact('game', 'result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game, Result $result)

    {  
        //Quiz creator can view detailed results of all participants.
        //User (participant) can view only his own result of the quiz.
    
        if (auth()->id() === $game->user_id || auth()->id() === $game->quiz->user_id)
        {
            return view('game.results', compact('game','result'));
        }else
        {
            abort(404); 
        }
        
        
    }

}
