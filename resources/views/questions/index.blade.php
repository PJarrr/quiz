@extends('layouts.app')

@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="title mb-3"> {{ __('My Questions') }}</h2>
                    <a class="cta-btn-sm p-3 mt-3" href="{{route('questions.create')}}">Add Question</a> <br> <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th class="w-25">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($questions as $question )
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
                            @empty
                            <tr>
                                <td>
                                    no questions yet, please hit the button above to create!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <span>{{$questions->links()}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection