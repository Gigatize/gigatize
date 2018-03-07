@extends('layouts.app')

@section('title','Home')

@section('header_styles')
  <style type="text/css">
    #header{
      background-image: url("{{ asset('images/desk-background.jpg') }}");
      min-height: 500px;
    }
    #callToAction{
      background: #FFF;
      opacity: .4;
    }
  </style>
@endsection

@section('content')
  <div id="header" class="ui grid">
    <div class="ten wide column">
        
    </div>
    <div id="callToAction" class="six wide column">
        
    </div>
  </div>
@endsection