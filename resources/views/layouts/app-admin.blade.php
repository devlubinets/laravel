<!doctype html>
<html lang="en, ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/custom/main.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/custom/admin.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('admin/css/modern.css') }}">
    @stack('styles')
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <style>
        body {
            opacity: 0;
        }
    </style>
    <title>@yield('title-block')</title>
</head>
<body>
<div class="splash">
    <div class="splash-icon"></div>
</div>
<div class="wrapper">
    @include('parts.aside-admin')
    <div class="main">
        @include('parts.header-admin')
        <main class="content">
            <div class="container-fluid">
                    @yield('content')
            </div>
        </main>
        @include('parts.footer-admin')
    </div>
</div>
<script src="{{ asset('admin/js/app.js') }}"></script>
@stack('script')
    <script>
        $(function() {
            // Datatables clients
            $("#datatables-clients").DataTable({
                responsive: true,
                order: []
            });
        });
    </script>
</body>
</html>

