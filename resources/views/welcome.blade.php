@extends('layouts.app')

@section('title','Home')

@section('header_styles')
  <style type="text/css">
      .overlay{
          background-color: rgba(255,255,255,.8);
          height: 100%;
      }
      .parallax-container{
          height: 750px;
      }
      .max-height{
          height: 100%;
      }
  </style>
@endsection

@section('content')
    <div id="index-banner" class="parallax-container">
        <div class="row no-pad-bot max-height">
            <div class="col m12 l7">
            </div>
            <div class="col m12 l5 overlay" style="padding: 5% 5%">
                <h1 class="header white-text" style="text-transform: capitalize">
                    <b>LET'S <br><span class="yellow-text">TRANSFORM</span> <br>THE WAY<br>WE WORK</b>
                </h1>
                <h5 class="dark-grey-text darken-2">
                    Find help when you need it,<br>help others when you can.
                </h5>
                <br>
                <button class="ui big yellow basic button" style="border: 2px solid #FBBD08;"><span class="black-text" style="text-transform: capitalize">Find A Gig</span></button>
                <button class="ui big yellow basic button" style="border: 2px solid #FBBD08;"><span class="black-text" style="text-transform: capitalize">Post A Gig</span></button>
            </div>
        </div>
        <div class="parallax">
            <video autoplay muted loop id="bgvid">
                <source src="{{asset('video/background1.mp4')}}" type="video/mp4">
            </video>
        </div>
    </div>


    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row" style="padding: 50px 0">
                <div class="col s12 m3">
                    <div class="icon-block center grey-text" style="text-transform: capitalize" >
                        <h2><i class="ui icon lightbulb outline"></i></h2>
                        <div class="ui statistic">
                            <div class="value">
                                121
                            </div>
                            <div class="label">
                                Total Gigs <br> Completed
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="center icon-block grey-text" style="text-transform: capitalize">
                        <h2><i class="ui icon lightbulb outline"></i></h2>
                        <div class="ui statistic">
                            <div class="value">
                                156
                            </div>
                            <div class="label">
                                Quick Quest <br> Answered
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="center icon-block grey-text" style="text-transform: capitalize">
                        <h2><i class="ui icon lightbulb outline"></i></h2>
                        <div class="ui statistic">
                            <div class="value">
                                24
                            </div>
                            <div class="label">
                                New Ideas <br> Generated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m3">
                    <div class="center icon-block grey-text" style="text-transform: capitalize">
                        <h2><i class="ui icon lightbulb outline"></i></h2>
                        <div class="ui statistic">
                            <div class="value">
                                53
                            </div>
                            <div class="label">
                                Awards <br> Granted
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="parallax-container valign-wrapper" style="height: 550px;">
            <div class="container overlay">
                <div class="row center" style="padding: 100px 0;">
                    <h1 class="header col s12 yellow-text">STEP 1:</h1>
                    <h3 class="header col s12 dark-grey-text">LEARN WHAT GIGATIZE <br>CAN DO FOR YOU</h3>
                    <h5 class="header col s12 dark-grey-text">Take our quick 2 minute survey to learn how you <br> can benefit the most from Gigatize.</h5>
                    <button class="ui big yellow basic button" style="border: 2px solid #FBBD08;"><span class="black-text" style="text-transform: capitalize">LET'S FIND OUT</span></button>
                </div>
            </div>
        <div class="parallax"><img src="{{asset('images/background2.png')}}" alt="Unsplashed background img 2"></div>
    </div>

    <div class="container hide-on-med-and-down">
        <div class="row center">
            <div class="ui equal width grid">
                <div class="column">
                    <div class="item yellow center" style="height: 100%; position: relative;">
                        <h4 class="white-text flow-text" style=" padding-top: 45%"><b>STRATEGY</b></h4>
                        <button class="ui big grey basic button fluid" style="border: 2px solid grey; position: absolute; bottom: 0;"><span class="black-text" style="text-transform: capitalize">Read More</span></button>
                    </div>
                </div>
                <div class="column tile">
                    <div class="item">
                        <div class="image">
                            <img src="{{asset('images/tile.png')}}" style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="item yellow center" style="height: 100%; position: relative;">
                        <h4 class="white-text flow-text" style=" padding-top: 40%"><b>TECHNICAL EXPERTISE</b></h4>
                        <button class="ui big grey basic button fluid" style="border: 2px solid grey; position: absolute; bottom: 0;"><span class="black-text" style="text-transform: capitalize">Read More</span></button>
                    </div>
                </div>
                <div class="column tile">
                    <div class="item">
                        <div class="image">
                            <img src="{{asset('images/tile2.png')}}" style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="item yellow center" style="height: 100%; position: relative;">
                        <h4 class="white-text flow-text" style=" padding-top: 45%"><b>DESIGN</b></h4>
                        <button class="ui big grey basic button fluid" style="border: 2px solid grey; position: absolute; bottom: 0;"><span class="black-text" style="text-transform: capitalize">Read More</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row center">
            <div class="ui equal width grid">
                <div class="column tile">
                    <div class="item">
                        <div class="image">
                            <img src="{{asset('images/tile3.png')}}" style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="item yellow center" style="height: 100%; position: relative;">
                        <h4 class="white-text flow-text" style=" padding-top: 40%"><b>DIGITAL MARKETING</b></h4>
                        <button class="ui big grey basic button fluid" style="border: 2px solid grey; position: absolute; bottom: 0;"><span class="black-text" style="text-transform: capitalize">Read More</span></button>
                    </div>
                </div>
                <div class="column tile">
                    <div class="item">
                        <div class="image">
                            <img src="{{asset('images/tile4.png')}}" style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="item yellow center" style="height: 100%; position: relative;">
                        <h4 class="white-text flow-text" style=" padding-top: 45%"><b>ENGINEERING</b></h4>
                        <button class="ui big grey basic button fluid" style="border: 2px solid grey; position: absolute; bottom: 0;"><span class="black-text" style="text-transform: capitalize">Read More</span></button>
                    </div>
                </div>
                <div class="column tile">
                    <div class="item">
                        <div class="image">
                            <img src="{{asset('images/tile5.png')}}" style="width:100%; height:100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer grey lighten-3">
        <div class="footer-copyright">
            <div class="container">
               <a class="black-text text-lighten-3" href="{{url('https://gigatize.io')}}">&copy; {{date("Y")}} Gigiatize.io</a>
            </div>
        </div>
    </footer>
@endsection

@section('footer_scripts')
  <script type="application/javascript">
    $(document).ready(function(){
        $('.parallax').parallax();
    });
  </script>
@endsection