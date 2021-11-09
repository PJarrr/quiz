<?php

namespace App\Jobs;

use App\Models\Result;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class StoreResult implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $game;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($game)
    {
        $this->game = $game;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         if (!Result::all()->contains($this->game->result()->first()))
        {
            
            $totalQuestionsCount = $this->game->quiz->questions->count();
            $allAnswers = $allGameAnswers = $this->game->answers()->get();
            $correctAnswers= 0;

            foreach ($allAnswers as $answer){
                if( $answer->answer === $answer->question()->first()->correct_answer)
                {
                    $correctAnswers++;
                }
            }
            //if its first time -store result
            $result=Result::create(['game_id'=>$this->game->id, 'correct_answers'=>$correctAnswers]);
        }
    }
}
