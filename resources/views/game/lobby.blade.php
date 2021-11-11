@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="title"> {{ __('Quiz Lobby') }}</h2>
                <div class="card-body">
                    <div class="card-body">

                        <p>Welcome to quiz {{$quiz->title}}.</p>
                        <p>Number of questions: {{$quiz->questions->count()}} </p>


                        {{-- dynamic content --}}
                        {{-- user first time starts the quiz game --}}

                        @if (!$game)
                        <p>Time: {{$quiz->time}} minutes</p>


                        <form method="POST" class="time" action="{{route('game.store')}}">
                            @csrf
                            <input type="hidden" name="quiz_id" value="{{$quiz->id}}">

                            <button type="submit" class="cta-btn">
                                {{ __('START') }}
                            </button>
                        </form>

                        {{-- user comes back to quiz game that has no results submited (not all answers answered ||
                        time left) --}}
                        @elseif($game && !$game->result()->count())
                        <p>Answers submited: {{$game->answers()->count()}} </p>
                        <p>Deadline: {{$finishTime}}</p>
                        <a class="cta-btn" href="{{route('game.play', $game)}}">continue</a>

                        {{-- user comes back to quiz game, but there is a result for this game already (all
                        questions answered || time) --}}
                        @elseif ($game->result()->count())

                        <a class="cta-btn" href="{{route('game.results.show', [$game, $game->result] )}}">show
                            result</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection