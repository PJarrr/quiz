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
            'correct_answer'=>'Washaw',
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
         DB::table('questions')->insert([
            
            'user_id' => 5,
            'question_text'=>'Which is the tallest animal?', 
            'correct_answer'=>'Giraffe',
            'incorrect_answer1'=>'Horse',
            'incorrect_answer2'=>'Python',
            'incorrect_answer3'=>'Dog',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 5,
            'question_text'=>'How many legs does a spider have?', 
            'correct_answer'=>'8',
            'incorrect_answer1'=>'6',
            'incorrect_answer2'=>'12',
            'incorrect_answer3'=>'7',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 5,
            'question_text'=>'How long can Emperor Penguins stay underwater?', 
            'correct_answer'=>'27 minutes',
            'incorrect_answer1'=>'15 minutes',
            'incorrect_answer2'=>'1 hour',
            'incorrect_answer3'=>'3 minutes',
        ]);

         DB::table('questions')->insert([
            
            'user_id' => 15,
            'question_text'=>'What is Kwik-E-Mart worker Apu\'s last name??', 
            'correct_answer'=>'Nahasapeemapetilon',
            'incorrect_answer1'=>'Patel',
            'incorrect_answer2'=>'Gumble',
            'incorrect_answer3'=>'Smith',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 15,
            'question_text'=>'On what TV show did early shorts of the The Simpsons air?', 
            'correct_answer'=>'The Tracey Ullman Show',
            'incorrect_answer1'=>'Saturday Night Live',
            'incorrect_answer2'=>'Larry King Live',
            'incorrect_answer3'=>'Late Show with Stephen Colbert',
        ]);

         DB::table('questions')->insert([
            
            'user_id' => 15,
            'question_text'=>'What\'s the name of Bart Simpson\'s best friend?', 
            'correct_answer'=>'Milhouse',
            'incorrect_answer1'=>'Karl',
            'incorrect_answer2'=>'Jimbo',
            'incorrect_answer3'=>'Otto',
        ]);

         DB::table('quizzes')->insert([
            'user_id' => 5,
            'title' => 'Capitals',
            'password'=>'123',
            'description' =>'Test quiz about coutry capital cities',
            'time'=>1,
        ]);
         DB::table('quizzes')->insert([
            'user_id' => 15,
            'title' => 'People',
            'password'=>'123',
            'description' =>'Test quiz about famous people',
            'time'=>1,
        ]);
         DB::table('quizzes')->insert([
            'user_id' => 5,
            'title' => 'Animals',
            'password'=>'123',
            'description' =>'Test quiz about animals',
            'time'=>1,
        ]);

         DB::table('quizzes')->insert([
            'user_id' => 15,
            'title' => 'Simpsons',
            'password'=>'123',
            'description' =>'Test quiz about the Simpsons',
            'time'=>1,
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

             DB::table('question_quiz')->insert([
            'quiz_id' => 25,
            'question_id' => 65,
        ]);
        DB::table('question_quiz')->insert([
            'quiz_id' => 25,
            'question_id' => 75,
        ]);
        DB::table('question_quiz')->insert([
            'quiz_id' => 25,
            'question_id' => 85,
        ]);
        DB::table('question_quiz')->insert([
            'quiz_id' => 35,
            'question_id' => 95,
        ]);
        DB::table('question_quiz')->insert([
            'quiz_id' => 35,
            'question_id' => 105,
        ]);
        DB::table('question_quiz')->insert([
            'quiz_id' => 35,
            'question_id' => 115,
        ]);
     

      
    }
}