<div id="project_{{$project}}" class="ui raised card">
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
                        <span class="comment-count">5</span> <i class="fas fa-comment"></i>
                        <span class="favorite-count" data-project="{{$project->id}}" style="margin-left: 3px;">{{$project->favoriteCount()}}</span> <i class="@if($project->favorited()) red-text @endif fas fa-heart favorite" data-project="{{$project->id}}"></i>
                    </span>
        Skills:
        @foreach($project->Skills as $skill)
            <a class="ui label" style="margin-bottom: 5px;">
                {{$skill->name}}
            </a>
        @endforeach
    </div>
</div>