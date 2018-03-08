@extends('layouts.app')

@section('title','Home')

@section('header_styles')
  <style type="text/css">
    #header{
         /* The image used */
      background-image: url("{{ asset('images/desk-background.jpg') }}");

      /* Set a specific height */
      height: 800px; 

      /* Create the parallax scrolling effect */
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    #callToAction{
      background-color: rgba(255, 255, 255, 0.4);
    }
    .yellow-text{
      color: #FCD307;
      opacity: 1;
    }
    .yellow{
      background-color: #FCD307;
    }
    .grey-text{
      color: #717070;
      opacity: 1;
    }
    .tile{
      height: 250px;
    }
    .ui.basic.button.no-radius{
      border-radius: 0;
      border: 3px solid #FCD307;
      color: #000;
    }
    h1{
      font-size: 70px;
      color: #FFF;
      line-height: 1em;
    }
    h4{
      font-size: 22px;
    }
  </style>
@endsection

@section('content')
  <div id="header" class="ui grid">
    <div class="ten wide column">
        
    </div>
    <div id="callToAction" class="six wide column">
      <div class="middle aligned content" style="margin-left: 10%; margin-top: 15%">
        <h1>LET'S <br> <span class="yellow-text">TRANSFORM</span> <br>THE WAY<br>WE WORK</h1>
        <h4 class="grey-text middle aligned">Find help when you need it, <br>help others when you can.</h4>
        <br>
        <button class="big ui yellow basic button no-radius" style="color: #000!important">FIND A GIG</button>
        <button class="big ui yellow basic button no-radius" style="color: #000!important">POST A GIG</button>
      </div>
    </div>
  </div>
  <div class="ui container">
    <div class="ui four statistics" style="margin-top: 5%; margin-bottom: 5%">
      <div class="ui huge statistic">
        <div class="value">
        121
        </div>
        <div class="label">
        TOTAL GIGS COMPLETED
        </div>
      </div>
      <div class="ui huge statistic">
        <div class="value">
        156
        </div>
        <div class="label">
        QUICK QUESTS ANSWERED
        </div>
      </div>
      <div class="ui huge statistic">
        <div class="value">
        24
        </div>
        <div class="label">
        NEW IDEAS GENERATED
        </div>
      </div>
      <div class="ui huge statistic">
        <div class="value">
        53
        </div>
        <div class="label">
        AWARDS GRANTED
        </div>
      </div>
    </div>
  </div>
  <div class="ui grid centered container">
    <div class="three wide column yellow tile">
      <div class="ui grid bottom aligned">
        <button class="ui grey basic button fluid">Read More</button>
      </div>
    </div>
    <div class="three wide column tile"></div>
    <div class="three wide column yellow tile"></div>
    <div class="three wide column tile"></div>
    <div class="three wide column yellow tile"></div>
    <div class="three wide column tile"></div>
    <div class="three wide column yellow tile"></div>
    <div class="three wide column tile"></div>
    <div class="three wide column yellow tile"></div>
    <div class="three wide column tile"></div>
  </div>
@endsection