<!doctype html>
<html lang="en, ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/basket.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick/slick-theme.css') }}">
    @stack('styles')
    <script src="{{ asset('js/app.js') }}" defer></script>
{{--    <script src="{{ asset('js/BtnTopFunction.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/slider.js') }}" defer></script>--}}

    <title>@yield('title-block')</title>
</head>
<body>
    <header class="card-header d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

        <div class="d-flex align-items-center col-3 ms-2 mb-2 mb-md-0 text-dark text-decoration-none text-center">
            <a href="/" class="navbar-brand link-style-header"> Вернутся на сайт </a>
        </div>
        <div class="nav col-2 mb-2 justify-content-end ms-3 mb-md-0">
            <div>
                <a href="{{route('login')}}" style="text-decoration: none">
                    <button type="button" class="btn btn-light text-dark me-2" >Войти</button>
                </a>
                <a href="{{route('register')}}">
                    <button type="button" class="btn btn-dark btn-main">Зарегистрироваться</button>
                </a>
            </div>
        </div>
    </header>
    @yield('content')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>

