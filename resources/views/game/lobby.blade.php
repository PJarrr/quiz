@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Play Quiz') }}</div>
                <div class="card-body">
                    <div class="card-body">

                        Welcome to quiz {{$quiz->title}}!!! <br>
                        Number of questions: {{$quiz->questions->count()}} <br>

                        {{-- dynamic content --}}
                        {{-- user first time starts the quiz game --}}

                        @if (!$game)
                        Time: {{$quiz->time}} minutes

                        <form method="POST" class="time" action="{{route('game.store')}}">
                            @csrf
                            <input type="hidden" name="quiz_id" value="{{$quiz->id}}">

                            <button type="submit" class="btn btn-primary">
                                {{ __('START') }}
                            </button>
                        </form>

                        {{-- user comes back to quiz game that has no results submited (not all answers answered ||
                        time left) --}}
                        @elseif($game && !$game->result()->count())
                        Answers submited: {{$game->answers()->count()}} <br>
                        Deadline: {{$finishTime}} <br>
                        <a class="btn btn-primary" href="{{route('game.play', $game)}}">continue</a>

                        {{-- user comes back to quiz game, but there is a result for this game already (all
                        questions answered || time) --}}
                        @elseif ($game->result()->count())

                        <a class="btn btn-primary" href="{{route('game.results.show', [$game, $game->result] )}}">show
                            result</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection