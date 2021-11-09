@extends('layouts.app')

@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <form method="POST" action="{{ route('login') }}">
                    @csrf



                    <h2 class="title"> {{ __('Login') }}</h2>
                    <p class="subtitle">Don't have an account? <a href="{{route('register')}}"> sign Up</a></p>

                    <div class="email-login">

                        <label for="email">{{ __('E-Mail Address')
                            }}</label>

                        <div class="">
                            <input id="email" type="email"
                                class="form-control mt-1 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="password" class="mt-2">{{ __('Password')
                            }}</label>


                        <div class="">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>




                    <div class="">
                        <div class="">
                            <button type="submit" class="cta-btn">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>


                </form>
            </div>



        </div>
    </div>
</div>
</div>
@endsection