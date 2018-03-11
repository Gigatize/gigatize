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
        <!-- Top Menu -->
        <header class="top attached">
            <div class="ui borderless menu" style="min-height: 75px; box-shadow: 0px -4px 13px 2px rgba(0,0,0,0.34);">
                <!-- Mobile only menu button -->
                <a class="item large-hide small-hide">
                    <i class="sidebar icon"></i>Menu
                </a>
                <!-- Widescreen Menu -->
                <a class="item" style="font-size: 2em;"><b>gig</b><span style="font-style: italic;">atize</span></a>
                <div class="right menu mobile-hide tablet-hide">
                    <a href="{{url('/')}}" class="item {{Request::is('/') ? 'active' :  ''}}">Home</a>
                    <a class="item">Company Impact</a>
                    <a href="{{url('/projects/create')}}" class="item {{Request::is('projects/create') ? 'active' :  ''}}">Find Talent</a>
                    <a class="item">Find a Gig</a>
                    <a class="item">Quick Quest</a>
                    <div class="ui dropdown item">
                        <i class="user icon"></i> {{Auth::user()->first_name . ' ' . Auth::user()->last_name}} <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item"><i class="address card outline icon"></i> Profile</a>
                            <a class="item"><i class="cog icon"></i> Settings</a>
                            <a class="item"><i class="sign out alternate icon"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Sidebar Menu -->
        <div class="ui bottom attached segment pushable">
          <div class="ui inverted labeled icon left inline vertical sidebar menu" style="">
            <a class="item">
              <i class="home icon"></i>
              Home
            </a>
            <a class="item">
              <i class="block layout icon"></i>
              Topics
            </a>
            <a class="item">
              <i class="smile icon"></i>
              Friends
            </a>
            <a class="item">
              <i class="calendar icon"></i>
              History
            </a>
          </div>
          <!-- Main Content -->
          <div class="pusher">
            <div class="ui basic segment">
              <@include('layouts.partials._alerts')
              @yield('content')
            </div>
          </div>
        </div>
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
