@extends('layouts.app')

@section('title','Home')

@section('header_styles')
  <style type="text/css">
    #header{
      background-image: url: {{ asset('images/work-background.jpg') }};
    }
  </style>
@endsection

@section('content')
  <div id='header' class="ui grid">
    <div class="ten wide column">
        
    </div>
    <div class="six wide column">
        
    </div>
  </div>
@endsection