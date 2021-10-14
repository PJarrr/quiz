@php
$quiz = $result->game->first()->quiz->first();
$answers = $result->game->first()->answers;
@endphp
@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('You finished quiz ') }}
                    {{$quiz->title}}
                </div>
                <div class="card-body">
                    <h3> Correct Answers: {{$result->correct_answers}}</h3>



                    @foreach ($quiz->questions as $question)
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                            {{$question->question_text}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="background:lightgreen;"><input @foreach ($answers as
                                    $answer) @if ($answer->question_id === $question->id && $answer->answer ===
                                $question->correct_answer ) checked
                                @endif


                                @endforeach



                                type="radio">{{$question->correct_answer}}</li>

                            <li class="list-group-item"><input type="radio">{{$question->incorrect_answer1}}</li>

                            <li class="list-group-item"><input type="radio">{{$question->incorrect_answer2}}</li>

                            <li class="list-group-item"><input type="radio">{{$question->incorrect_answer3}}</li>
                        </ul>
                    </div>
                    <hr>



                    @endforeach














                </div>

            </div>
        </div>
    </div>
    @endsection