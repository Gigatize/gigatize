@extends('layouts.app')

@section('content')
    <select class="ui fluid search dropdown" multiple="">
        <option value="">State</option>
        @foreach(\App\Models\Skill::all()->take(10) as $skill)
        <option value="{{$skill->name}}">{{$skill->name}}</option>
        @endforeach
    </select>
@endsection

