@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Play Quiz') }}</div>
                <div class="card-body">
                    <form method="POST" class="" action="{{route('game.lobby')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Quiz Title')
                                }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text"
                                    class="form-control @error('quiz_title') is-invalid @enderror" name="quiz_title"
                                    value="{{ old('quiz_title') }}" required autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quiz_password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                }}</label>
                            <div class="col-md-6">
                                <input id="quiz_password" required type="password"
                                    class="form-control @error('quiz_password') is-invalid @enderror"
                                    name="quiz_password" value="{{ old('quiz_password') }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enter') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection