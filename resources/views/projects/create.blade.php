@extends('layouts.app')

@section('content')
    <select class="ui fluid search" multiple="">
        <option value="">State</option>
        @foreach($skills as $skill)
        <option value="{{$skill->name}}">{{$skill->name}}</option>
        @endforeach
    </select>
@endsection

