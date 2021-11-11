@extends('layouts.app')

@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <img class="card-img-top" src="{{$question_img}}" alt="">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">
                        <div id="clockdiv" class="time">
                            <div id="clockdiv" class="time">
                                <span>Time left: </span>
                                <span class="hours"></span>
                                <span class="smalltext">:</span>
                                <span class="minutes"></span>
                                <span class="smalltext">:</span>
                                <span class="seconds"></span>
                                <span class="smalltext">Seconds</span>
                            </div>
                    </h6>
                    <form class="d-flex flex-column" method="post" action="{{route('game.submitAnswer', $game)}}">
                        @method('POST')
                        <h4 class="card-title border-bottom border-primary pt-2 pb-2">Question
                            {{$game->answers->count()+1}} /
                            {{$game->questions->count()}} :
                            {{$question_text}}
                        </h4>
                        @foreach ($options as $option )
                        <div>
                            <input type="radio" name="answer" value="{{$option}}"> {{$option}}
                            <input type="hidden" value="{{$question_id}}" name="question_id">
                        </div>
                        @endforeach
                        @csrf
                        <button class="cta-btn" type="submit">@if ( $game->answers->count()+1 ===
                            $game->questions->count() ) FINISH QUIZ @else NEXT QUESTION
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                @endif
                            </svg> </button>
                    </form>
                </div>
            </div>
        </div>
        @endsection