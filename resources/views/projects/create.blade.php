@extends('layouts.app')

@section('content')
    <select class="ui simple fluid search dropdown" multiple="">
        <option value="">State</option>
        @foreach(\App\Models\Skill::all() as $skill)
        <option value="{{$skill->name}}">{{$skill->name}}</option>
        @endforeach
    </select>
@endsection

