@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Quiz details') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Participant</th>
                                <th>Date</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz->games as $game )
                            <tr>
                                <td>
                                    <a
                                        href="{{route('game.results.show', [$game, $game->result])}}">{{$game->user->name}}</a>
                                </td>
                                <td>
                                    {{$game->result->created_at}}
                                </td>
                                <td>
                                    {{round(($game->result->correct_answers / $game->quiz->questions->count())*100, 2)}}
                                    %
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