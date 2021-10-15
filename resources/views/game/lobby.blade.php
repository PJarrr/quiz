@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Play Quiz') }}</div>
                <div class="card-body">
                    Welcome to quiz {{$quiz->title}}!!! <br>
                    Number of questions: {{$quiz->questions->count()}} <br>
                    @if($game)
                    You already started this quiz.
                    Number of answered questions: {{$game->answers->count()}} <br>
                    Deadline time: {{$finishTime}} <br>
                    @endif

                    @if (!$game)
                    Time: {{$quiz->time}} minutes
                    @endif
                    <form method="POST" class="time" action="{{route('game.store')}}">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary">
                                @if ($game && ($quiz->questions->count() === $game->answers->count()) )
                                {{ __('show results') }}
                                @elseif ($game)
                                {{ __('continue') }}
                                @else (!$game)
                                {{ __('START') }}
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection