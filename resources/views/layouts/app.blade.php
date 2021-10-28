<!doctype html>
<html lang="en, ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick/slick-theme.css') }}">
    @stack('styles')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/BtnTopFunction.js') }}" defer></script>
{{--    <script src="{{ asset('js/slider.js') }}" defer></script>--}}

    <title>@yield('title-block')</title>
</head>
{{--<body onload="loadfun()">--}}
<body>
{{--<div id="loading"><img id="img-loading" src="{{ asset('images/fk3smrzna1vieidxaawn.gif') }}" alt="download"></div>--}}
    @include('parts.header')

    <div class="container-fluid">
        @if(session()->has('success'))
            <p class="alert alert-success text-center">{{ session()->get('success') }}</p>
        @endif

        @if(session()->has('warning'))
            <p class="alert alert-warning text-center">{{ session()->get('warning') }}</p>
        @endif

        @yield('content')
    </div>

    @include('parts.footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/slick.js') }}"></script>
<script>
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
</script>
<!--<script>
    var load = document.getElementById("loading");
    function loadfun() {
        load.style.display = 'none';
    }
</script>-->
</body>
</html>

