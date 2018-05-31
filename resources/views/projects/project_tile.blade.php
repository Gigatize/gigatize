<div id="project_{{$project}}" class="ui raised card @if($project->isSponsored()) sponsored @endif">
    <div class="content project-header background-gradient-{{$project->Category->color}}" style="flex-shrink: 0; flex-grow: 0;">
        <div class="right floated">{{$project->estimated_hours}} <i class="fas fa-trophy"></i></div>
        <img class="ui image"><a href="{{url('users/'.$project->Owner->id)}}" style="color:rgb(64,63,50)"></a>
        <div class="row" style="margin-bottom: 0; margin-top: 5px;">
            @if($project->isSponsored())
                <a class="ui blue ribbon label text-center">Sponsored by: <hr style="margin-bottom: 5px;"> @foreach($project->Sponsors as $sponsor) <img class="ui avatar image" src="{{asset($sponsor->picture)}}"> {{$sponsor->first_name}} {{$sponsor->last_name}} <br> @endforeach</a>
            @endif
            <div class="right floated">{{$project->start_date->diffForHumans(null, true)}} <i class="fas fa-calendar-alt"></i></div>
        </div>
    </div>
    <div class="content" style="flex-grow: 1;">
        <h1 class="ui header">{{$project->title}}</h1>
        @if(strlen($project->description)>250)
            <p>{{substr($project->description,0,200)}}...</p>
        @else
            <p>{{$project->description}}</p>
        @endif
    </div>
    <div class="content like" style="position: relative; flex-grow: 0;">
        <span class="right floated">
            <span class="comment-count">{{$project->totalCommentCount()}}</span> <i class="fas fa-comment"></i>
            <span class="favorite-count" data-project="{{$project->id}}" style="margin-left: 3px;">{{$project->favoriteCount()}}</span> <i class="@if($project->favorited()) red-text @endif fas fa-heart favorite icon like" data-project="{{$project->id}}"></i>
        </span>
        Skills:
        @foreach($project->Skills()->limit(2)->get() as $skill)
            <a class="ui label" style="margin-bottom: 5px;">
                {{$skill->name}}
            </a>
        @endforeach
        @if($project->Skills()->count())
            <a class="ui label more-skills" data-html="{{implode(" <br> ",$project->Skills()->skip(2)->take(PHP_INT_MAX)->pluck('name')->toArray())}}" data-position="bottom center" data-inverted="" style="margin-bottom: 5px;">
                <i class="fas fa-ellipsis-h"></i>
            </a>
        @endif
    </div>
    <a href="{{url('/projects/'.$project->id)}}">
        <div class="ui bottom attached button">
                <i class="eye icon"></i>
                View Details
        </div>
    </a>
</div>