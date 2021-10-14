<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Result;

class GameResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Game $game)
    {

    
        //chec if it is first time when submiting result for this game
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

        
        return view('game.results', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
