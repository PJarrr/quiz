@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('You finished quiz ') }}
                    {{$result->game()->first()->quiz()->first()->title}}
                </div>
                <div class="card-body">

                    Correct Answers: {{$result->correct_answers}}





                </div>

            </div>
        </div>
    </div>
    @endsection