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
            'name' => 'admin',
            'email' => 'admin@admin.lt',
             'password' => Hash::make('123'),
            
        ]);

        DB::table('users')->insert([
            'name' => 'neAdmin',
            'email' => 'neadmin@admin.lt',
             'password' => Hash::make('123'),
           
        ]);

         DB::table('questions')->insert([
            
            'user_id' => 5,
            'question_text'=>'Kas?', 
            'correct_answer'=>'correct1',
            'incorrect_answer1'=>'2',
            'incorrect_answer2'=>'3',
            'incorrect_answer3'=>'4',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 5,
            'question_text'=>'Kodel?', 
            'correct_answer'=>'correct2',
            'incorrect_answer1'=>'2',
            'incorrect_answer2'=>'3',
            'incorrect_answer3'=>'4',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 5,
            'question_text'=>'Kaip?', 
            'correct_answer'=>'correct3',
            'incorrect_answer1'=>'2',
            'incorrect_answer2'=>'3',
            'incorrect_answer3'=>'4',
            
        ]);

         DB::table('questions')->insert([
            
            'user_id' => 15,
            'question_text'=>'Kas?', 
            'correct_answer'=>'correct1',
            'incorrect_answer1'=>'2',
            'incorrect_answer2'=>'3',
            'incorrect_answer3'=>'4',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 15,
            'question_text'=>'Kodel?', 
            'correct_answer'=>'correct2',
            'incorrect_answer1'=>'2',
            'incorrect_answer2'=>'3',
            'incorrect_answer3'=>'4',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 15,
            'question_text'=>'Kaip?', 
            'correct_answer'=>'correct3',
            'incorrect_answer1'=>'2',
            'incorrect_answer2'=>'3',
            'incorrect_answer3'=>'4',
            
        ]);

         DB::table('quizzes')->insert([
            'user_id' => 5,
            'title' => 'quiz1',
            'password'=>'123',
            'description' =>'test quiz',
            'time'=>1,
        ]);
         DB::table('quizzes')->insert([
            'user_id' => 15,
            'title' => 'quiz2',
            'password'=>'123',
            'description' =>'test quiz',
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
     

        


    
    }
}
