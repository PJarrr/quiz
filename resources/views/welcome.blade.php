@extends('layouts.app')
@section('content')

<body>
    <main role="main" class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-2">Quiz website </h1>
                    <p class="lead">This simple quiz website is made for educational purposes only. To try all
                        functionality please register.</p>

                    @if (Route::has('login'))
                    @auth
                    <script>
                        window.location = "{{ route('home') }}";
                    </script>

                    @else
                    <a class="btn btn-lg btn-primary" href="{{ route('login') }}" role="button">
                        Log in &raquo;</a>

                    @if (Route::has('register'))
                    <a class="btn btn-lg btn-primary" href="{{ route('register') }}" role="button">
                        Register</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
    </main>


    @endsection
</body>

</html>

