@extends('layouts.static')

@section('title','View Gig Details')

@section('header_styles')

<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- STYLES -->
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<style>
	div#header div.px-3 a.text-secondary{
		font-family: "Open Sans", sans-serif;
		font-size: 15px;
		font-weight: 300;
		color: #000 !important;
	}

	div#header div.px-3{
		padding: 0 15px;
	}
	div#header{
		background-color: #FFF;
		box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
	}
    a#join_btn:hover{
        text-decoration: none;
        cursor: hand;
        font-family: "Open Sans",sans-serif;
    }
	a#leave_btn:hover{
		text-decoration: none;
		cursor: hand;
		font-family: "Open Sans",sans-serif;
	}
	a#complete_btn:hover{
		text-decoration: none;
		cursor: hand;
		font-family: "Open Sans",sans-serif;
	}
	a#start_btn:hover{
		text-decoration: none;
		cursor: hand;
		font-family: "Open Sans",sans-serif;
	}
</style>
@endsection

@section('content')
<div id="header" style="padding: 5px 20px; height: 80px;">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<a href="{{url('/')}}"><img src="{{asset('images/logo.svg')}}" width="240px" height="70px" class="logo" /></a>
		</div>
		<div class="px-3" id="header-search">
			<i class="fas fa-search"></i>
		</div>
		<div class="px-3">
			<a href="{{url('/projects/create')}}" class="text-secondary">Post a Gig</a>
		</div>
		<div class="px-3">
			<a href="{{url('/projects')}}" class="text-secondary">Find a Gig</a>
		</div>
		<div class="px-3">
			<a href="{{url('/company-profile')}}" class="text-secondary">Company Impact</a>
		</div>
		<div class="px-3">
			<div class="dropdown" id="profile-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<a class="text-secondary" href="#"><img src="{{asset(Auth::user()->picture)}}" height="30px" class="avatar" style="border-radius: 30px;"/>&nbsp; {{Auth::user()->first_name . " " . Auth::user()->last_name}} <i class="fas fa-caret-down"></i></a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile-dropdown-button">
					<a class="dropdown-item" href="{{url('users/'.Auth::id())}}"><small><i class="fas fa-fw fa-address-card"></i> Profile</small></a>
					<a class="dropdown-item" href="#"><small><i class="fas fa-fw fa-cogs"></i> Account Settings</small></a>
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="container">
		<div class="card rounded-corners no-border py-1 px-3 mt-3 mb-3">
			<h1 class="mt-3">
				{{$project->title}}<br />
			</h1>
			<h5 class="text-muted mb-3">{{$project->description}}</h5>
			<div class="gradient-divider gradient-divider-{{$project->Category->color}} mb-1"></div>
			<div class="row no-gutters">
				<div class="col col-lg-3">
					<button type="button" class="btn btn-empty btn-block">
						<i class="fas fa-trophy"></i>&nbsp;
						+{{$project->estimated_hours}} Points
					</button>
				</div>
				<div class="col col-lg-3">
					<button type="button" class="btn btn-empty btn-block">
						<i class="fas fa-heart"></i>&nbsp;
						{{$project->favoriteCount()}} Favorited
					</button>
				</div>
				<div class="col col-lg-3">
					<button type="button" class="btn btn-empty btn-block">
						<i class="fas fa-eye"></i>&nbsp;
						10 Watching
					</button>
				</div>
				<div class="col col-lg-3">
					<button type="button" class="btn btn-empty btn-block">
						<i class="fas fa-comments"></i>&nbsp;
						{{$project->totalCommentCount()}} Comments
					</button>
				</div>
			</div>
		</div>
		<div class="row no-gutters align-items-stretch">
			<!-- Sidebar -->
			<div class="col-12 col-md-5 col-lg-4 col-xl-3">
				<div class="card rounded-corners no-border mr-3">
					<div class="row align-items-start">
						<div class="col-xs-12 col-sm-6 col-md-12 text-center">
							<img src="{{asset($project->Category->icon_path)}}" class="sidebar-icon mt-3" />
							<div class="text-uppercase m-2">Data Analysis</div>
							<div class="gradient-divider gradient-divider-{{$project->Category->color}} mx-3"></div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-12 w-100">
							<div class="pt-3 pr-3 pb-2 pl-3">
								@foreach($project->Skills as $skill)
								<button type="button" class="btn btn-outline-secondary mb-1" style="white-space: normal;">{{$skill->name}}</button>
								@endforeach
							</div>
							<div class="row no-gutters text-center">
								<div class="col card bg-light no-rounded-corners p-2" style="border-left: 0px;">
									<h4 class="text-{{$project->Category->text_color}} mb-1">{{$project->start_date->diffInDays()}}</h4>
									<small style="font-size: 11px;">Days Until Start</small>
								</div>
								<div class="col card bg-light no-rounded-corners p-2" style="border-left: 0px;">
									<h4 class="text-{{$project->Category->text_color}} mb-1">{{$project->estimated_hours}}</h4>
									<small style="font-size: 11px;">Estimated Hours</small>
								</div>
								<div class="col card bg-light no-rounded-corners p-2" style="border-left: 0px; border-right: 0px;">
									<h4 class="text-{{$project->Category->text_color}} mb-1">{{$project->deadline->diffInDays()}}</h4>
									<small style="font-size: 11px;">Days Until Deadline</small>
								</div>
							</div>
						</div>
					</div>
					@if(!$project->started and $project->Owner->id == Auth::id())
						<a id="start_btn" href="{{url('/projects/'.$project->id.'/start')}}"><button type="button" class="btn btn-danger btn-xl no-rounded-corners btn-block text-uppercase" style="border-radius: 0 0 5px 5px">Kickoff Project</button></a>
					@elseif($project->complete)
						<button type="button" class="btn btn-danger btn-xl no-rounded-corners btn-block text-uppercase" style="border-radius: 0 0 5px 5px" disabled>Complete</button>
					@elseif($project->Owner->id == Auth::id())
						<a id="complete_btn" href="{{url('/projects/'.$project->id.'/complete')}}"><button type="button" class="btn btn-danger btn-xl no-rounded-corners btn-block text-uppercase" style="border-radius: 0 0 5px 5px">Complete Project</button></a>
					@elseif($project->hasUser(Auth::user()))
                    	<a id="leave_btn" href="{{url('/projects/'.$project->id.'/users/'.Auth::id().'/leave')}}"><button type="button" class="btn btn-danger btn-xl no-rounded-corners btn-block text-uppercase" style="border-radius: 0 0 5px 5px">Leave Project</button></a>
					@else
						<a id="join_btn" href="{{url('/projects/'.$project->id.'/users/'.Auth::id().'/join')}}"><button type="button" class="btn btn-accent btn-xl no-rounded-corners btn-block text-uppercase" style="border-radius: 0 0 5px 5px" @if($project->Users->count() == $project->user_count) disabled @endif>Join Project</button></a>
					@endif
				</div>
			</div>
			<!-- Main Content -->
			<div class="col-12 col-md-7 col-lg-8 col-xl-9 card rounded-corners no-border p-3 h-100">

				<!--Accordion wrapper-->
				<div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

					<!-- Accordion card -->
					<div class="card">

						<!-- Card header -->
						<div class="card-header" role="tab" id="headingOne">
							<a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<h5 class="mb-0">
									Logistics <i class="fa fa-angle-down rotate-icon"></i>
								</h5>
							</a>
						</div>

						<!-- Card body -->
						<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx" >
							<div class="card-body">
								<p>
									The gig will kick off in <strong class="text-{{$project->Category->text_color}}">{{$project->start_date->diffInDays()}} days</strong> on <strong class="text-{{$project->Category->text_color}}">{{$project->start_date->toFormattedDateString()}}</strong> and you will be one of <strong class="text-{{$project->Category->text_color}}">{{$project->user_count}} members</strong> on the team. Completion of this gig is estimated to take <strong class="text-{{$project->Category->text_color}}">{{$project->estimated_hours}} hours</strong> per member.
								</p>
								<h5>You will gain <span class="text-{{$project->Category->text_color}}">{{$project->Skills()->count() * 5}} experience points</span> distributed among the following skillsets</h5>
								<ul>
									@foreach($project->Skills as $skill)
										<li>{{$skill->name}} <span class="text-{{$project->Category->text_color}}">+5</span></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<!-- Accordion card -->

					<!-- Accordion card -->
					<div class="card">

						<!-- Card header -->
						<div class="card-header" role="tab" id="headingTwo">
							<a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<h5 class="mb-0">
									Details <i class="fa fa-angle-down rotate-icon"></i>
								</h5>
							</a>
						</div>

						<!-- Card body -->
						<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
							<div class="card-body">
								<p>{{$project->impact}}</p>
								<h5>More Information:</h5>
								<p><a href="{{$project->resources_link}}">{{$project->resources_link}}</a></p>

								<h5>This gig will be complete when the following criteria has been met:</h5>
								<ul style="list-style-type:square">
									@foreach($project->AcceptanceCriteria as $criteria)
										<div class="form-check">
											<input class="form-check-input filled-in acceptance-criteria" data-id="{{$criteria->id}}" type="checkbox" value="" id="filledInCheckbox1" @if($project->Owner->id != Auth::id()) disabled @endif @if($criteria->complete) checked @endif>
											<label class="form-check-label" for="filledInCheckbox1">
												<li>{{$criteria->criteria}}</li>
											</label>
										</div>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<!-- Accordion card -->

					<!-- Accordion card -->
					<div class="card">

						<!-- Card header -->
						<div class="card-header" role="tab" id="headingThree">
							<a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<h5 class="mb-0">
									Team <i class="fa fa-angle-down rotate-icon"></i>
								</h5>
							</a>
						</div>

						<!-- Card body -->
						<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordionEx">
							<div class="card-body">
								<div class="row justify-content-center mb-3">
									<div class="col-xs-12 col-md-6 col-lg-4" style="text-align: center">
										<img src="{{asset($project->Owner->picture)}}" class="photo-thumbnail photo-thumbnail-large mb-2"  style="height: 200px; width: 200px; border-radius: 200px;"/><br />
										<strong>{{$project->Owner->first_name . " " . $project->Owner->last_name}}</strong><br />
										Gig Sponsor <br />
										<div class="btn-group btn-group-sm" role="group">
											<a href="mailto:{{$project->Owner->email}}"><button type="button" class="btn btn-empty"><i class="fas fa-envelope"></i></button></a>
											<a href="{{url('/users/'.$project->Owner->id)}}"><button type="button" class="btn btn-empty"><i class="fas fa-address-card"></i></button></a>
										</div>
									</div>
								</div>
								<div class="row justify-content-center mb-3">
									@foreach($project->Users as $index=>$user)
										<div class="col-md-6 col-lg-{{$columns}}" style="text-align: center">
											<img src="{{asset($user->picture)}}" class="photo-thumbnail photo-thumbnail-large mb-2" style="height: 200px; width: 200px; border-radius: 200px;" /><br />
											<strong>{{$user->first_name . " " . $user->last_name}}</strong><br />
											Team Member {{$index+1}}<br />
											<div class="btn-group btn-group-sm" role="group">
												<a href="mailto:{{$user->email}}"><button type="button" class="btn btn-empty"><i class="fas fa-envelope"></i></button></a>
												<a href="{{url('/users/'.$user->id)}}"><button type="button" class="btn btn-empty"><i class="fas fa-address-card"></i></button></a>
											</div>
										</div>
									@endforeach
									@for ($i = $project->Users->count()+1 ; $i <= $project->user_count ; $i++)
										<div class="col-md-6 col-lg-{{$columns}}" style="text-align: center">
											<img src="{{asset('images/user.svg')}}" class="photo-thumbnail photo-thumbnail-large mb-2" style="height: 200px; width: 200px; border-radius: 200px;" /><br />
											<strong>Open Position</strong><br />
											Team Member {{$i}}<br />
										</div>
									@endfor
								</div>
							</div>
						</div>
					</div>
					<!-- Accordion card -->
				</div>
			</div>
			<div class="col-md-9 offset-3 card rounded-corners" style="background-color: #fff">
				<!-- Card content -->
				<div class="card-body">

					<!-- Title -->
					<h4 class="card-title"><strong><i class="fa fa-comments"></i> Comments</strong></h4>
					<hr>
					@foreach($project->comments as $comment)
					<div class="media">
						<img class="d-flex mr-3 photo-thumbnail" src="{{asset($comment->commented->picture)}}" alt="Generic placeholder image">
						<div class="media-body">
							<h5 class="mt-0 font-weight-bold">{{$comment->commented->first_name . " " . $comment->commented->last_name}}</h5>
							{{$comment->comment}}
						</div>
					</div>
					<hr>
					@endforeach
					<form id="comments_form" method="post" action="{{url('/projects/'.$project->id.'/comment')}}">
						<!-- Default textarea -->
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Leave Comment</label>
							<textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
						</div>
						{{csrf_field()}}
						<input type="submit" class="btn btn-primary">
					</form>
				</div>

			</div>
			</div>
		</div>
	</div>
@endsection

@section('footer_scripts')
	<!-- LIBRARIES -->
	<script
			src="https://code.jquery.com/jquery-3.3.1.js"
			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			crossorigin="anonymous"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="{{asset('libs/popper.min.js')}}"></script>
	<script src="{{asset('libs/bootstrap-4.0.0/js/bootstrap.min.js')}}"></script>
	<script>
		$(document).ready(function(){
		    $('.acceptance-criteria').change(function () {
		        var id = $(this).attr('data-id');
		        console.log(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{url('/acceptance-criteria/toggle')}}"+"/"+id,
					dataType: 'json',
                    success: function () {
                    },
                });
            })
		});
	</script>
@endsection