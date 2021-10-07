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
                    Time: X
                    <a class="btn btn-primary" href="{{route('game.play', $quiz)}}">Play Quiz</a>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection