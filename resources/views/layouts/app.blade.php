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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.css') }}">

    @yield('header_styles')

</head>
<body>
    <div class="wrapper" style="position: relative; height: 100%">
        @include('layouts.partials._header')
        @include('layouts.partials._alerts')
        <div id="content" style="padding-bottom: 70px;">
            @yield('content')
        </div>
        @includeWhen(!Request::is('projects/create'), 'layouts.partials._footer')

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/semantic.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script>
        $(document).ready(function() {
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
