@extends('layouts.app')

@section('title','Home')

@section('content')
    <div class="ui grid container">
        <div class="column">
            {{\Illuminate\Support\Facades\Session::all()}}
        </div>
    </div>
@endsection