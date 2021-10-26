@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h3>Quiz in progress, answer questions</h3>
                    <div id="clockdiv" class="time">
                        <span>Deadline in: </span>
                        <span class=" days"></span>
                        <span class="smalltext">Days </span>
                        <span class="hours"></span>
                        <span class="smalltext">Hours</span>
                        <span class="minutes"></span>
                        <span class="smalltext">Minutes</span>
                        <span class="seconds"></span>
                        <span class="smalltext">Seconds</span>
                    </div>
                </div>
                <div class="card-body">
                    <form class="d-flex flex-column" method="post" action="{{route('game.submitAnswer', $game)}}">
                        @method('POST')

                        <h4>Question {{$game->answers->count()+1}} / {{$game->questions->count()}} : {{$question_text}}
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
    </div>
    @endsection