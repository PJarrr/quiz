@php
$quiz = $game->quiz;
$questions = $quiz->questions;
$answers = $game->answers;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">Your results of {{$quiz->title}}

                </div> --}}
                <div class="card-body p-5">
                    <div class="card mt-2 mb-5">
                        <div class="card-body">
                            <h3 class="card-title">Your results of {{$quiz->title}}</h3>
                            <h4 class="card-subtitle mt-3 mb-2">Correct answers {{$result->correct_answers}} /
                                {{$questions->count()}} or {{round($result->correct_answers/$questions->count() *100, 2)
                                }}%
                            </h4>
                            <p class="card-text">Please see detailed quiz results below</p>
                        </div>
                    </div>
                    @foreach ($quiz->questions as $question)
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                            {{$question->question_text}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="background:lightgreen;"><input @foreach ($answers as
                                    $answer) @if ($answer->question_id === $question->id && $answer->answer
                                ===
                                $question->correct_answer ) checked
                                @endif
                                @endforeach type="radio">{{$question->correct_answer}}</li>

                            <li class="list-group-item"><input @foreach ($answers as $answer) @if ($answer->question_id
                                === $question->id && $answer->answer ===
                                $question->incorrect_answer1 ) checked
                                @endif
                                @endforeach type="radio">{{$question->incorrect_answer1}}</li>

                            <li class="list-group-item"><input @foreach ($answers as $answer) @if ($answer->question_id
                                === $question->id && $answer->answer ===
                                $question->incorrect_answer2 ) checked
                                @endif
                                @endforeach type="radio">{{$question->incorrect_answer2}}</li>

                            <li class="list-group-item"><input @foreach ($answers as $answer) @if ($answer->question_id
                                === $question->id && $answer->answer ===
                                $question->incorrect_answer3 ) checked
                                @endif
                                @endforeach type="radio">{{$question->incorrect_answer3}}</li>
                        </ul>
                    </div>
                    <hr>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    @endsection