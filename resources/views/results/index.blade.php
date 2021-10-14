@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Quiz Results') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Quiz title</th>
                                <th>Quiz author</th>
                                <th>Your Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result )
                            <tr>
                                <td>
                                    <a href="#">{{$result->game->quiz->title}}</a>
                                </td>
                                <td>
                                    {{$result->game->quiz->user->name}}
                                </td>
                                <td>
                                    {{ ($result->correct_answers / $result->game->quiz->questions->count() )  *100  }} %
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection