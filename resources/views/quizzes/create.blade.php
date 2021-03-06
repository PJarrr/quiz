@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Quiz') }}</div>

                <div class="card-body">
                    <form method="POST" autocomplete="off" action="{{ route('quizzes.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required autofocus autocomplete="off">

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description')
                                }}</label>
                            <div class="col-md-6">
                                <textarea name="description" value="{{ old('description') }}"
                                    class="form-control @error('description') is-invalid @enderror" id=""
                                    required></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{
                                __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input autocomplete="off" id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Time (minutes)')
                                }}</label>

                            <div class="col-md-6">
                                <input autocomplete="off" id="time" number type="text"
                                    class="form-control @error('password') is-invalid @enderror" name="time" required>

                                @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="questions" class="col-md-4 col-form-label text-md-right">{{ __('Questions')
                                }}</label>

                            <div class="col-md-6">
                                <select name="questions[]" value="{{ old('questions[]') }}" class="form-control select2"
                                    multiple id="">
                                    @foreach ($questions as $question )
                                    <option value="{{$question->id}}">{{$question->question_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Quiz') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('select').select2({
        language: {
        noResults: function() {
        return "<a href='{{route('questions.create')}}'>No questions found. Click to create</a>";
        }
        },
        escapeMarkup: function (markup) {
        return markup;
        }
        });
    
</script>
@endsection