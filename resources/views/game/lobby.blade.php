@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Play Quiz') }}</div>
                <div class="card-body">
                    Welcome to quiz {{$game->quiz->title}}!!! <br>
                    Number of questions: {{$game->quiz->questions->count()}} <br>
                    Time: X
                    <a class="btn btn-primary" href="{{route('game.play', $game)}}">Play Quiz</a>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection