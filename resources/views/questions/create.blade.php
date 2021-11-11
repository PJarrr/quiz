@extends('layouts.app')

@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <h2 class="title"> {{ __('Add Question') }}</h2>
                <div class="card-body">
                    <form method="POST" autocomplete="off" action="{{ route('questions.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="question_text" class="col-md-4 col-form-label text-md-right">{{ __('Question*')
                                }}</label>
                            <div class="col-md-6">
                                <input id="question_text" type="text"
                                    class="form-control @error('question_text') is-invalid @enderror"
                                    name="question_text" value="{{ old('question_text') }}" required autofocus>
                                @error('question_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correct_answer" class="col-md-4 col-form-label text-md-right">{{ __('Correct
                                answer*') }}</label>
                            <div class="col-md-6">
                                <input id="correct_answer" type="text"
                                    class="form-control @error('correct_answer') is-invalid @enderror"
                                    name="correct_answer" value="{{ old('correct_answer') }}" required autofocus>
                                @error('correct_answer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="incorrect_answer1" class="col-md-4 col-form-label text-md-right">{{
                                __('Incorrect answer*') }}</label>
                            <div class="col-md-6">
                                <input id="incorrect_answer1" type="text"
                                    class="form-control @error('incorrect_answer1') is-invalid @enderror"
                                    name="incorrect_answer1" value="{{ old('incorrect_answer1') }}" required autofocus>
                                @error('incorrect_answer1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="incorrect_answer2" class="col-md-4 col-form-label text-md-right">{{
                                __('Incorrect answer*') }}</label>
                            <div class="col-md-6">
                                <input id="incorrect_answer2" type="text"
                                    class="form-control @error('incorrect_answer2') is-invalid @enderror"
                                    name="incorrect_answer2" value="{{ old('incorrect_answer2') }}" required autofocus>
                                @error('incorrect_answer2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="incorrect_answer3" class="col-md-4 col-form-label text-md-right">{{
                                __('Incorrect answer*') }}</label>
                            <div class="col-md-6">
                                <input id="incorrect_answer3" type="text"
                                    class="form-control @error('incorrect_answer3') is-invalid @enderror"
                                    name="incorrect_answer3" value="{{ old('incorrect_answer3') }}" required autofocus>
                                @error('incorrect_answer3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="image" class=" col-md-4 col-form-label text-md-right">{{
                                __('Upload image') }}</label>
                            <div class="col-md-6">
                                <img class="img-preview rounded mx-auto pb-3 d-block mw-100" src="" alt="">
                                <input id="image" type="file" name="image" class="img-upload" onchange="readURL(this);">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="cta-btn">
                                    {{ __('ADD') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/image-preview.js') }}"></script>
@endsection