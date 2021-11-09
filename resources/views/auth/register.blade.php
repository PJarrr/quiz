@extends('layouts.app')

@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="title"> {{ __('Register') }}</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="email-login col-md">

                            <label for="name">{{ __('Name')
                                }}</label>
                            <div class="">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="email" class="">{{ __('E-mail adress')
                                }}</label>
                            <div class="">
                                <input id="email" type="email"
                                    class="form-control  @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <label for="password" class="">{{ __('Password')
                                }}</label>
                            <div class="">
                                <input id="" type="password"
                                    class="form-control  @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('email') }}" required autocomplete="password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="password-confirm">{{ __('Comfirm Password')
                                }}</label>
                            <div class="">
                                <input id="" type="password" class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                            <div class="">
                                <div class="">
                                    <button type="submit" class="cta-btn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection