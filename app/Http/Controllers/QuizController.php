<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuizRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::where('user_id', auth()->id())->get();
        
        return view('quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $questions = Question::where('user_id', auth()->id())->get();


        return view('quizzes.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizRequest $request)
    {
        $quiz = Quiz::create($request->validated() + ['user_id' => auth()->id()]); 
        $quiz->questions()->attach($request->questions); 

        return redirect()->route('quizzes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {   
        if($quiz->user_id != auth()->id()){
        abort(403);
        };

        $questions = Question::where('user_id', auth()->id())->get();
        // $quiz->load('questions');
        return view('quizzes.edit', compact('quiz', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuizRequest $request, Quiz $quiz)
    {
        if($quiz->user_id != auth()->id()){
        abort(403);
        };

        $quiz->update($request->validated());
        $quiz->questions()->sync($request->questions);
        
        return redirect()->route('quizzes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        if($quiz->user_id != auth()->id()){
        abort(403);
        };

        $quiz->delete();

        return redirect()->route('quizzes.index');
    }
}
