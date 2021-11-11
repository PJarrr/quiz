@extends('layouts.app')

@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<main>
    <div class="container">
        <div class="cards">
            <div class="card-single">
                <div>
                    <h1>{{$user->questions->count()}}</h1>
                    <span>Questions created</span>
                </div>
                <div>
                    <span class="fas fa-users"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>{{$user->quizzes->count()}}</h1>
                    <span>Quizes created</span>
                </div>
                <div>
                    <span class="fas fa-clipboard-list"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>{{$user->games->count()}}</h1>
                    <span>Quizes finished</span>
                </div>
                <div>
                    <span class="fas fa-shopping-cart"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>
                        @if ($user->results->sum('correct_answers') != 0 && $totalAnsweredQuestions != 0)
                        {{round(($user->results->sum('correct_answers') / $totalAnsweredQuestions)*100,2) }} %
                        @else
                        No data yet
                        @endif
                    </h1>
                    <span>Average quiz result</span>
                </div>
                <div>
                    <span class="fas fa-wallet"></span>
                </div>
            </div>
        </div>
        <div class="recent-grid">
            <div class="projects">
                <div class="card shadow-none">
                    <div class="card-header bg-white border-0 p-0">
                        <h2 class="m-0">My quizes</h2>
                        <button class="btn"><a href="{{route('quizzes.index')}}">see all</a></button>
                    </div>


                    <div class=" card-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td style="width:60%;">Quiz Title</td>
                                        <td style="width:10%;">Participants</td>
                                        <td style="width:10%;">Average result</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userQuizzes as $quiz)
                                    <tr>
                                        <td>
                                            {{$quiz->title}}
                                        </td>
                                        <td>
                                            {{$quiz->games->count()}}
                                        </td>
                                        <td>
                                            @if ($quiz->games->count())
                                            {{round( $quiz->results->sum('correct_answers')/($quiz->questions->count() *
                                            $quiz->games->count())*100,2)}} %
                                            @else
                                            no results yet
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>wow such empty... <a href="{{route('quizzes.create')}}">create your first
                                                quiz
                                                here</a> </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="customers">
                <div class="card .shadow-none">
                    <div class="card-header bg-white">
                        <h4 class="m-0">My Recent Results</h4>
                        <button class="btn"><a href="{{route('results.index')}}">see all</a></button>
                    </div>
                    <table>
                        <tbody>
                            @forelse ($user->results as $result )
                            <tr>
                                <td data-title="Column #1"><a
                                        href="{{route('game.results.show', [$result->game, $result] )}}">{{$result->game->quiz->title}}<a>
                                </td>
                                <td data-title="Column #2">By {{$result->game->quiz->user->name}}</td>
                                <td data-title="Column #3">@if ($result->correct_answers === 0)
                                    0
                                    @else
                                    {{ round(($result->correct_answers / $result->game->quiz->questions->count())
                                    *100,2 )}} %
                                    @endif</td>
                            </tr>
                            @empty
                            <tr>
                                <td>You did not participate in any quiz</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection