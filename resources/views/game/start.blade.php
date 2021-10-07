@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Play Quiz') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{route('game.lobby')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="title"
                                class="col-md-4 col-form-label text-md-right">{{ __('Enter Quiz Title') }}</label>

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
                            <button type="submit" class="btn btn-primary">
                                {{ __('Enter') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection