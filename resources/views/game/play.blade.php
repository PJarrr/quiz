@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                {{-- <img class="card-img-top" src="@if ($question->img) question->img @endif" alt="img"> --}}
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">
                        <div id="clockdiv" class="time">
                            <div id="clockdiv" class="time">
                                <span>Time left: </span>
                                <span class="hours"></span>
                                <span class="smalltext">Hours</span>
                                <span class="minutes"></span>
                                <span class="smalltext">Minutes</span>
                                <span class="seconds"></span>
                                <span class="smalltext">Seconds</span>
                            </div>
                    </h6>
                    <form class="d-flex flex-column" method="post" action="{{route('game.submitAnswer', $game)}}">
                        @method('POST')
                        <h4 class="card-title border-bottom border-primary p-3">Question {{$game->answers->count()+1}} /
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
                        <button class="btn btn-primary mt-3" type="submit">Submit answer</button>
                    </form>
                </div>
            </div>
        </div>
        @endsection