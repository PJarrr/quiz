@extends('layouts.app')

@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<main>
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
                <h1>%</h1>
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
                                @foreach ($user->quizzes as $quiz)
                                <tr>
                                    <td>{{$quiz->title}}</td>

                                    <td>
                                        {{$quiz->games->count()}}
                                    </td>

                                    <td>

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

                    <div class="customer">
                        <div class="info">
                            <div>
                                <h4> <a class="" href=""></a>
                                </h4>
                                <small>By </small>
                            </div>
                        </div>
                        <div class="contact">
                            <span class="">



                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</main>
@endsection