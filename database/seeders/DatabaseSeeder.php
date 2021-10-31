<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@user.lt',
             'password' => Hash::make('123'),
            
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@user.lt',
             'password' => Hash::make('123'),
           
        ]);

         DB::table('questions')->insert([
            
            'user_id' => 5,
            'question_text'=>'Capital of USA', 
            'correct_answer'=>'Washington',
            'incorrect_answer1'=>'New York',
            'incorrect_answer2'=>'Los Angeles',
            'incorrect_answer3'=>'Denver',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 5,
            'question_text'=>'Capital of Poland?', 
            'correct_answer'=>'Washawa',
            'incorrect_answer1'=>'Krakow',
            'incorrect_answer2'=>'Gdansk',
            'incorrect_answer3'=>'Vilnius',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 5,
            'question_text'=>'Capital of Germany?', 
            'correct_answer'=>'Berlin',
            'incorrect_answer1'=>'Munich',
            'incorrect_answer2'=>'Frankfurt',
            'incorrect_answer3'=>'Hamburg',
            
        ]);

         DB::table('questions')->insert([
            
            'user_id' => 15,
            'question_text'=>'Who is current president of the USA?', 
            'correct_answer'=>'Joe Biden',
            'incorrect_answer1'=>'Barack Obama',
            'incorrect_answer2'=>'Kamala Harris',
            'incorrect_answer3'=>'Donald Trump',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 15,
            'question_text'=>'Who is Jim Carray?', 
            'correct_answer'=>'Actor',
            'incorrect_answer1'=>'Rock star',
            'incorrect_answer2'=>'Politic',
            'incorrect_answer3'=>'Pet detective',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 15,
            'question_text'=>'Who is the founder of Laravel?', 
            'correct_answer'=>'Taylor Otwel',
            'incorrect_answer1'=>'Alan Turing',
            'incorrect_answer2'=>'Ada Lovelace',
            'incorrect_answer3'=>'Larry Page',
            
        ]);

         DB::table('quizzes')->insert([
            'user_id' => 5,
            'title' => 'Capitals',
            'password'=>'123',
            'description' =>'test quiz about coutry capital cities',
            'time'=>2,
        ]);
         DB::table('quizzes')->insert([
            'user_id' => 15,
            'title' => 'People',
            'password'=>'123',
            'description' =>'Test quiz about famous people',
            'time'=>2,
        ]);

         DB::table('question_quiz')->insert([
            'quiz_id' => 5,
            'question_id' => 5,
        ]);
         DB::table('question_quiz')->insert([
            'quiz_id' => 5,
            'question_id' => 15,
        ]);
         DB::table('question_quiz')->insert([
            'quiz_id' => 5,
            'question_id' => 25,
        ]);
         DB::table('question_quiz')->insert([
            'quiz_id' => 15,
            'question_id' => 35,
        ]);

         DB::table('question_quiz')->insert([
            'quiz_id' => 15,
            'question_id' => 45,
        ]);
         DB::table('question_quiz')->insert([
            'quiz_id' => 15,
            'question_id' => 55,
        ]);
     

        


    
    }
}
