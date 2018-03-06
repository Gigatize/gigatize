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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">
    <style>
        .ui.menu a.active.item{
            color: #f6d448;
            background: none;
        }
    </style>
    @yield('header_styles')

</head>
<body>
    <div id="app">
        @include('layouts.partials._header')
        @include('layouts.partials._alerts')
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script>
        $(document).ready(function() {


            $('.ui.dropdown').dropdown();

            $('.message .close').on('click', function() {
                $(this).closest('.message').transition('fade');
            });

        });
    </script>
    @yield('footer_scripts')
</body>
</html>
