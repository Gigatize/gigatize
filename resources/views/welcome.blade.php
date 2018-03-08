@extends('layouts.app')

@section('title','Home')

@section('header_styles')
  <style type="text/css">
    #header{
      background-image: url("{{ asset('images/desk-background.jpg') }}");
      min-height: 950px;
    }
    #callToAction{
      background-color: rgba(255, 255, 255, 0.4);
    }
    .yellow-text{
      color: #FCD307;
      opacity: 1;
    }
    .grey-text{
      color: #717070;
      opacity: 1;
    }
    .ui.basic.button.no-radius{
      border-radius: 0;
      border: 3px solid #FCD307;
      color: #000;
    }
     .ui.parallax {
      height: 10em;
    }
    
    /* possiblly semantic styles */
    .ui.parallax {
      background-attachment: fixed;
    }
    .ui.fluid.parallax{
      width: 100%;  
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
    <div id="callToAction" class="six wide column fluid parallax">
      <div class="middle aligned content" style="margin-left: 10%; margin-top: 10%">
        <h1>LET'S <br> <span class="yellow-text">TRANSFORM</span> <br>THE WAY<br>WE WORK</h1>
        <h4 class="grey-text middle aligned">Find help when you need it, <br>help others when you can.</h4>
        <br>
        <button class="big ui yellow basic button no-radius" style="color: #000!important">FIND A GIG</button>
        <button class="big ui yellow basic button no-radius" style="color: #000!important">POST A GIG</button>
      </div>
    </div>
  </div>
@endsection