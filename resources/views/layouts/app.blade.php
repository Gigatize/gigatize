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
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/semantic.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".dropdown-button").dropdown({belowOrigin: true});
            $(".ui.dropdown").select();

            $(".button-collapse").sideNav();

            $('.message .close').on('click', function() {
                $(this).closest('.message').transition('fade');
            });

            var trig = 1;

            //animate searchbar width increase to  +150%
            $('#search').click(function(e) {
                //handle other nav elements visibility here to avoid push down
                if (trig == 1){
                    $('#navfix2').animate({
                        width: '+=150',
                        marginRight: 0
                    }, 400);

                    $('.search-label').animate({
                        left: '0',
                    }, 400);

                    trig ++;
                }

            });

            // if user leaves the form the width will go back to original state

            $("#search").focusout(function() {

                $('#navfix2').animate({
                    width: '-=150'
                }, 400);

                trig = trig - 1;

                $('.search-label').animate({
                    left: '80%',
                }, 400);

                $('#search').val("");

            });

        });
    </script>
    @yield('footer_scripts')
</body>
</html>
