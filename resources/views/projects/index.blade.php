@extends('layouts.app')

@section('header_styles')
    <style type="text/css">
        .pagination li.active{
            color: #facd39;
            background-color: #fff;
        }
        .pagination li.active span{
            color: #facd39;
            display: inline-block;
            font-size: 1.2rem;
            padding: 0 10px;
            line-height: 30px;
        }
        .pagination li span{
            color: #444;
            display: inline-block;
            font-size: 1.2rem;
            padding: 0 10px;
            line-height: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="ui borderless menu" style="margin: 25px 50px 0 50px;">
        <a class="item"><i class="fas fa-filter" style="padding-right: 5px;"></i> Filters:</a>
        <div class="right menu">
            <div class="ui dropdown item">
                Category <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item">English</a>
                    <a class="item">Russian</a>
                    <a class="item">Spanish</a>
                </div>
            </div>
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
        <a class="ui label" style="max-height: 25px">
            Another Filter <i class="close icon"></i>
        </a>
    </div>
    <div class="ui three stackable cards" style="margin: 25px 50px;">
        @foreach($projects as $project)
            <div class="ui raised card">
                <div class="content">
                    <div class="right floated meta">{{$project->estimated_hours}} <i class="fas fa-star"></i></div>
                    <img class="ui avatar image" src="{{asset('images/tile.png')}}"> {{$project->Owner->first_name . " " . $project->Owner->last_name}}
                    <div class="row" style="margin-bottom: 0; margin-top: 5px;">
                        <div class="right floated meta">{{$project->start_date->format('M d')}} <i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
                <div class="content">
                    <h3>{{$project->title}}</h3>
                    @if(strlen($project->description)>250)
                        <p>{{substr($project->description,0,250)}}...</p>
                    @else
                        <p>{{$project->description}}</p>
                    @endif
                </div>
                <div class="content">
                    <span class="right floated">
                        <span class="comment-count">5</span> <i class="far fa-comment"></i>
                        <span class="favorite-count" data-project="{{$project->id}}" style="margin-left: 3px;">{{$project->favoriteCount()}}</span> <i class="@if($project->favorited()) fas red-text @else far @endif fa-heart favorite" data-project="{{$project->id}}"></i>
                    </span>
                    <i class="fas fa-tag"></i> Skills:
                    @foreach($project->Skills as $skill)
                        <a class="ui label" style="margin-bottom: 5px;">
                            {{$skill->name}}
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="ui grid container">
        <div class="sixteen wide column center">
            {{ $projects->links() }}
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            FontAwesomeConfig = { autoReplaceSvg: 'nest' }
        });
        $(document).on("click",".favorite[data-prefix='far']",function () {
            var project_id = $(this).attr('data-project');
            $.post( "{{url('/favorite')}}/"+project_id, { '_token': '{{csrf_token()}}' }, function( data ) {
                if(data.success){
                    $(".favorite[data-prefix='far'][data-project="+project_id+"]").attr('data-prefix','fas').addClass('red-text');
                    var currentCount =  parseInt($(".favorite-count[data-project="+project_id+"]").html());
                    $(".favorite-count[data-project="+project_id+"]").html(currentCount+1);
                }
            });
        });

        $(document).on("click",".favorite[data-prefix='fas']",function () {
            var project_id = $(this).attr('data-project');
            $.post( "{{url('/unfavorite')}}/"+project_id, { '_token': '{{csrf_token()}}' }, function( data ) {
                if(data.success){
                    $(".favorite[data-prefix='fas'][data-project="+project_id+"]").attr('data-prefix','far').removeClass('red-text');
                    var currentCount =  parseInt($(".favorite-count[data-project="+project_id+"]").html());
                    $(".favorite-count[data-project="+project_id+"]").html(currentCount-1);
                }
            });
        });
    </script>
@endsection