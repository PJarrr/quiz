@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <h2 class="title"> {{ __('Play Quiz') }}</h2>
                <div class="card-body">
                    <form method="POST" class="" action="{{route('game.lobby')}}" autocomplete="off">
                        @csrf
                        <div class="email-login">
                            <label for="title">{{ __('Quiz title')
                                }}</label>
                            <div class="">
                                <input id="title" type="title"
                                    class="form-control mt-1 @error('title') is-invalid @enderror" name="quiz_title"
                                    value="{{ old('quiz_title') }}" required autocomplete="title" autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="password">{{ __('Password')
                                }}</label>
                            <div class="">
                                <input id="password" type="password"
                                    class="form-control mt-1 @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" required autocomplete="title" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="cta-btn">
                                {{ __('GO GO') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection