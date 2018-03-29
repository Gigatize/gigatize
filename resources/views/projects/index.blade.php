@extends('layouts.app')

@section('content')
    <div class="ui borderless menu" style="margin: 25px 50px 0 50px;">
        <a class="item"><i class="fas fa-filter" style="padding-right: 5px;"></i> Filters:</a>
        <div class="right menu">
            <div class="ui dropdown item">
                Points <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item">English</a>
                    <a class="item">Russian</a>
                    <a class="item">Spanish</a>
                </div>
            </div>
            <div class="ui dropdown item">
                Start Date <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item">English</a>
                    <a class="item">Russian</a>
                    <a class="item">Spanish</a>
                </div>
            </div>
            <div class="ui dropdown item">
                Skills <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item">English</a>
                    <a class="item">Russian</a>
                    <a class="item">Spanish</a>
                </div>
            </div>
            <div class="ui dropdown item">
                Relevance <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item">English</a>
                    <a class="item">Russian</a>
                    <a class="item">Spanish</a>
                </div>
            </div>
            <div class="ui dropdown item">
                Sort By <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item">English</a>
                    <a class="item">Russian</a>
                    <a class="item">Spanish</a>
                </div>
            </div>
            <div class="ui category search item">
                <div class="ui transparent icon input">
                    <input class="prompt" type="text" placeholder="Search..." style="margin-bottom: 0">
                    <i class="search link icon"></i>
                </div>
                <div class="results"></div>
            </div>
        </div>
    </div>
    <div class="ui secondary menu" style="margin:0 50px; max-height: 25px">
        <a class="ui label" style="max-height: 25px">
            Some Filter <i class="close icon"></i>
        </a>
    </div>
    <div class="ui grid" style="margin: 25px 50px;">
        @foreach($projects as $project)
        <div class="four wide column">
            <div class="ui card" style="width: 100%">
                <div class="content">
                    <div class="right floated meta">14h <i class="fas fa-clock"></i></div>
                    <img class="ui avatar image" src="{{asset('images/tile.png')}}"> Elliot
                    <div class="row" style="margin-bottom: 0; margin-top: 5px;">
                        <div class="right floated meta">14h <i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
                <div class="content">
                    <h3>{{$project->title}}</h3>
                    <p>{{$project->description}}</p>
                </div>
                <div class="content">
                    <span class="right floated">
                      <i class="far fa-comment"></i>
                      <i class="far fa-heart"></i>
                    </span>
                    <i class="fas fa-tag"></i> Skills: @foreach($project->Skills as $skill)
                        <a class="ui label">
                            {{$skill->name}}
                        </a>
                                @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection