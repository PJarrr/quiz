@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="title mb-3"> {{ __('My Quizzes') }}</h2>
                    <div class="card-body">
                        <a class="cta-btn" href="{{route('quizzes.create')}}">new quiz</a> <br> <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width:35%;">Title</th>
                                    <th style="width:35%;">Description</th>
                                    <th style="width:30%;">Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($quizzes as $quiz )
                                <tr>
                                    <td>
                                        <a href="{{route('quizzes.show', $quiz)}}">{{$quiz->title}}</a>
                                    </td>
                                    <td>
                                        {{$quiz->description}}
                                    </td>
                                    <td>
                                        <a href="{{route('quizzes.edit', $quiz)}}"
                                            class="btn btn-sm btn-primary">edit</a>
                                        <form method="POST" action="{{route('quizzes.destroy', $quiz)}}" style="
                                                                display:inline;">
                                            @csrf
                                            @method('DELETE ')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        No quizzes yet, please create!
                                    </td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection