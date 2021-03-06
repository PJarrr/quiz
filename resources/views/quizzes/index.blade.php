@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Quizzes') }}</div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{route('quizzes.create')}}">new quiz</a> <br> <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:40%;">Title</th>
                                <th style="width:40%;">Description</th>
                                <th style="width:20%;">Actions </th>
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
                                    <a href="{{route('quizzes.edit', $quiz)}}" class="btn btn-sm btn-primary">edit</a>
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