<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::where('user_id', auth()->id())->get();

        return view('questions.index', compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        // $image = '';
        
        //dd($url);
        $question = Question::create($request->validated() + ['user_id' => auth()->id()]);
        

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid('img_');
            $path = public_path() . '/images/';
            $url = asset('images/'.$imageName);
            $image -> move($path, $imageName);
            // dd($url);
            $question->update(['image' => $url]);
        }

        return redirect()->route('questions.index');

        
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
    public function edit(Question $question)
    {
          if($question->user_id != auth()->id()){
            abort(403);
        }; 

        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestionRequest $request, Question $question)
    {
        if($question->user_id != auth()->id()){
            abort(403);
        };

        $question->update($request->validated());

         if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid('img_');
            $path = public_path() . '/images/';
            $url = asset('images/'.$imageName);
            $image -> move($path, $imageName);
            // dd($url);
            $question->update(['image' => $url]);
        }

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if($question->user_id != auth()->id()){
            abort(403);
        };

        $question->delete();

        return redirect()->route('questions.index');
    }
}
