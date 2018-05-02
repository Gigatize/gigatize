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
    <style>
        #content body{
            font-family: "Open Sans",sans-serif;
        }
    </style>
    @yield('header_styles')

</head>
<body>
    <div class="wrapper" style="position: relative;">
        <div id="content">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    @yield('footer_scripts')
</body>
</html>
