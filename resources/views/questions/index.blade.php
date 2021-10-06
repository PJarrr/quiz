@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My questions') }}</div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{route('questions.create')}}">new question</a> <br> <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($questions as $question )
                            <tr>
                                <td>
                                    <a href="{{route('questions.show', $question)}}">{{$question->question_text}}</a>
                                </td>
                                <td>
                                    <a href="{{route('questions.edit', $question)}}"
                                        class="btn btn-sm btn-primary">edit</a>
                                    <form method="POST" action="{{route('questions.destroy', $question)}}" style="
                                                                display:inline;">
                                        @csrf
                                        @method('DELETE ')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection