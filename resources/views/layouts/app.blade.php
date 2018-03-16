<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gigatize | @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.css') }}">
    <style>
        nav{
            min-height: 80px;
        }
        nav div.nav-wrapper{
            background-color: #fff;
            color: #000;
            min-height: 80px;
            padding: 5px 20px;
        }
        div.nav-wrapper ul li a{
            color: #000;
            background: none;
        }
        div.nav-wrapper ul li a.active{
            color: #f6d448;
            background: none;
        }
    </style>
    @yield('header_styles')

</head>
<body>
    @include('layouts.partials._header')
    @include('layouts.partials._alerts')

    @yield('content')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.ui.dropdown').dropdown();

            $(".dropdown-button").dropdown({belowOrigin: true});

            $(".button-collapse").sideNav();

            $('.message .close').on('click', function() {
                $(this).closest('.message').transition('fade');
            });
        });
    </script>
    @yield('footer_scripts')
</body>
</html>
