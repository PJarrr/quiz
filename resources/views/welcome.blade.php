<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: "Nunito", sans-serif;
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            display: grid;
            place-items: center;

        }

        main {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
        }


        .img {
            background-image: url("./img/quiz-welcome.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            width: 50vw;
            height: 100vh;
        }

        .welcome {
            background-color: #fff;
            color: #FF9899;
            width: 35vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

        }

        .welcome h1 {
            font-size: 3em;
            width: 80%;
        }

        a {
            padding: 10px;
            color: #fff;
            text-decoration: none;
        }

        button {
            padding: 1em;
            background-color: #FF9899;
            border: none;
            border-radius: 10px;
        }

        button:hover {
            background-color: #ff989ac9;
        }
    </style>

</head>

<body>
    <main>
        <div class="img"></div>

        <div class="welcome">
            <h1>Welcome! Please login or register.</h1>
            <div>

                @if (Route::has('login'))
                @auth

                <script>
                    window.location = "{{ route('home') }}";
                </script>

                @else
                <button><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></button>
                or
                @if (Route::has('register'))
                <button><a href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-700 underline">Register</a></button>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </main>




</body>

</html>