@extends('layouts.app')

@section('content')
    <div class="ui multiple dropdown">
        <input type="hidden" name="filters">
        <i class="filter icon"></i>
        <span class="text">Select Skills</span>
        <div class="menu">
            <div class="ui icon search input">
                <i class="search icon"></i>
                <input type="text" placeholder="Search skills...">
            </div>
            <div class="divider"></div>
            <div class="header">
                <i class="tags icon"></i>
                Tag Label
            </div>
            <div class="scrolling menu">
                @foreach(\App\Models\Skill::all()->take(10) as $skill)
                <div class="item" data-value="important">
                    <div class="ui red empty circular label"></div>
                    {{$skill->name}}
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection