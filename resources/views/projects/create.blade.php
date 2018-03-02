@extends('layouts.app')

@section('title','Find Talent')

@section('content')
    <select class="ui fluid search dropdown" multiple="">
        <option value="">State</option>
        @foreach($skills as $skill)
        <option value="{{$skill->name}}">{{$skill->name}}</option>
        @endforeach
    </select>
@endsection

@section('footer_scripts')
    <script>
        $('.ui.dropdown').dropdown();
    </script>
@endsection

