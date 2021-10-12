@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Please answer the question') }}</div>
                <div class="card-body">
                    <form class="d-flex flex-column" method="post" action="{{route('game.submitAnswer', $game)}}">
                        @method('POST')
                        id:{{$question_id}}
                        Question:{{$question_text}}
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