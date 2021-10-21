@extends('layouts.app')
{{-- //{{dd($gameQuestionsCount)}} --}}
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
                        @if ($user->results->sum('correct_answers') != 0 && $gameQuestionsCount != 0)
                        {{round(($user->results->sum('correct_answers') / $gameQuestionsCount)*100,2)}}
                        @else
                        No data to show
                        @endif
                        %</h1>
                    <span>Average quiz result</span>
                </div>
                <div>
                    <span class="fas fa-wallet"></span>
                </div>
            </div>
        </div>

        <div class="recent-grid">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h2>My quizes</h2>
                        <button class="btn"><a href="">see all</a></button>
                    </div>
                    <div class=" card-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Quiz Title</td>
                                        <td>Participants</td>
                                        <td>Average result</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userQuizzes as $quiz)
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
                                    @endforeach
                                </tbody>
                            </table>
                            <span>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="customers">
                <div class="card">
                    <div class="card-header">
                        <h2>My recent results</h2>
                        <button class="btn"><a href="">see all</a></button>
                    </div>
                    <div class="card-body">

                        @foreach ($user->results as $result )
                        <div class="customer">
                            <div class="info">
                                <div>
                                    <h4> <a href="{{route('game.results.show', [$result->game, $result] )}}">{{$result->game->quiz->title}}<a>
                                    </h4>
                                    <small>By {{$result->game->quiz->user->name}}</small>
                                </div>
                            </div>
                            <div class="contact">
                                <span class="">
                                    @if ($result->correct_answers === 0)
                                    0
                                    @else
                                    <h4>{{($result->correct_answers / $result->game->quiz->questions->count()) *100 }} %
                                    </h4>
                                    @endif


                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>

</main>
@endsection