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
            
            'user_id' => 1,
            'question_text'=>'Kas?', 
            'correct_answer'=>'1',
            'incorrect_answer1'=>'2',
            'incorrect_answer2'=>'3',
            'incorrect_answer3'=>'4',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 1,
            'question_text'=>'Kodel?', 
            'correct_answer'=>'1',
            'incorrect_answer1'=>'2',
            'incorrect_answer2'=>'3',
            'incorrect_answer3'=>'4',
            
        ]);
         DB::table('questions')->insert([
            
            'user_id' => 1,
            'question_text'=>'Kaip?', 
            'correct_answer'=>'1',
            'incorrect_answer1'=>'2',
            'incorrect_answer2'=>'3',
            'incorrect_answer3'=>'4',
            
        ]);

         DB::table('quizzes')->insert([
            'user_id' => 1,
            'title' => 'quiz1',
            'password'=>'123',
            'description' =>'test quiz'
        ]);

         DB::table('question_quiz')->insert([
            'quiz_id' => 1,
            'question_id' => 1,
        ]);
         DB::table('question_quiz')->insert([
            'quiz_id' => 1,
            'question_id' => 2,
        ]);
         DB::table('question_quiz')->insert([
            'quiz_id' => 1,
            'question_id' => 3,
        ]);

        


    
    }
}
