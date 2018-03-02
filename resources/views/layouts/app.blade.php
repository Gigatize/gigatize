<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gigatize') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">
    <style>
        .ui.menu a.active.item{
            color: #f6d448;
            background: none;
        }
    </style>

</head>
<body>
    <div id="app">
        <div class="ui top attached borderless menu" style="height: 75px; box-shadow: 0px -4px 13px 2px rgba(0,0,0,0.34);">
            <a class="item" style="font-size: 2em;"><b>gig</b><span style="font-style: italic;">atize</span></a>
            <div class="right menu">

                <a class="item {{Request::is('/') ? 'active' :  ''}}">Home</a>
                <a class="item">Company Impact</a>
                <a class="item">Find Talent</a>
                <a class="item">Find a Gig</a>
                <a class="item">Quick Quest</a>
                <div class="ui dropdown item">
                    <i class="user icon"></i> {{Auth::user()->first_name . ' ' . Auth::user()->last_name}} <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item">English</a>
                        <a class="item">Russian</a>
                        <a class="item">Spanish</a>
                    </div>
                </div>

            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script>
        $('.ui.dropdown').dropdown();
    </script>
</body>
</html>
