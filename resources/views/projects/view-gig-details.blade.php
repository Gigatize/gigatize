@extends('layouts.static')

@section('title','View Gig Details')

@section('header_styles')

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
		<div class="card no-rounded-corners no-border py-1 px-3 mt-3 mb-3">
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
						5 Comments
					</button>
				</div>
			</div>
		</div>
		<div class="row no-gutters align-items-stretch">
			<!-- Sidebar -->
			<div class="col-12 col-md-5 col-lg-4 col-xl-3">
				<div class="card no-rounded-corners no-border mr-3">
					<div class="row align-items-start">
						<div class="col-xs-12 col-sm-6 col-md-12 text-center">
							<img src="{{asset($project->Category->icon_path)}}" class="sidebar-icon mt-3" />
							<div class="text-uppercase m-2">Data Analysis</div>
							<div class="gradient-divider gradient-divider-{{$project->Category->color}} mx-3"></div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-12 w-100">
							<div class="pt-3 pr-3 pb-2 pl-3">
								@foreach($project->Skills as $skill)
								<button type="button" class="btn btn-outline-secondary mb-1">{{$skill->name}}</button>
								@endforeach
							</div>
							<div class="row no-gutters text-center">
								<div class="col card bg-light no-rounded-corners p-2" style="border-left: 0px;">
									<h4 class="text-primary mb-1">{{$project->start_date->diffInDays()}}</h4>
									<small style="font-size: 11px;">Days Until Start</small>
								</div>
								<div class="col card bg-light no-rounded-corners p-2" style="border-left: 0px;">
									<h4 class="text-primary mb-1">{{$project->estimated_hours}}</h4>
									<small style="font-size: 11px;">Estimated Hours</small>
								</div>
								<div class="col card bg-light no-rounded-corners p-2" style="border-left: 0px; border-right: 0px;">
									<h4 class="text-primary mb-1">{{$project->deadline->diffInDays()}}</h4>
									<small style="font-size: 11px;">Days Until Deadline</small>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-accent btn-xl no-rounded-corners btn-block text-uppercase">Make an Impact</button>
				</div>
			</div>
			<!-- Main Content -->
			<div class="col-12 col-md-7 col-lg-8 col-xl-9 card no-rounded-corners no-border p-3 h-100">
				<div class="w-100">
					<div id="accordion">
						<h2 data-toggle="collapse" data-target="#logistics"><i class="fas fa-xs fa-caret-down"></i> Logistics</h2>
						<div id="logistics" class="collapse show" data-parent="#accordion">
							<p>
								The gig will kick off in <strong class="text-{{$project->Category->text_color}}">{{$project->start_date->diffInDays()}} days</strong> on <strong class="text-{{$project->Category->text_color}}">{{$project->start_date->toFormattedDateString()}}</strong> and you will be one of <strong class="text-{{$project->Category->text_color}}">{{$project->user_count}} members</strong> on the team. Completion of this gig is estimated to take <strong class="text-{{$project->Category->text_color}}">{{$project->estimated_hours}} hours</strong> per member.
							</p>
							<h5>You will gain <span class="badge badge-pill badge-accent">{{$project->Skills()->count() * 5}} experience points</span> distributed among the following skillsets</h5>
							<ul>
								@foreach($project->Skills as $skill)
									<li>{{$skill->name}} <span class="badge badge-pill badge-accent">+5</span></li>
								@endforeach
							</ul>
						</div>
						<h2 data-toggle="collapse" data-target="#details" class="mt-3 collapsed"><i class="fas fa-xs fa-caret-down"></i></i> Details</h2>
						<div id="details" class="collapse" data-parent="#accordion">
							<p>{{$project->impact}}</p>
							<h5>More Information:</h5>
							<p><a href="{{$project->resources_link}}">{{$project->resources_link}}</a></p>

							<h5>This gig will be complete when the following criteria has been met:</h5>
							<ul style="list-style-type:square">
								@foreach($project->AcceptanceCriteria as $criteria)
									<li>{{$criteria->criteria}}</li>
								@endforeach
							</ul>
						</div>
						<h2 data-toggle="collapse" data-target="#team" class="mt-3 collapsed"><i class="fas fa-xs fa-caret-down"></i></i> Team</h2>
						<div id="team" class="collapse" data-parent="#accordion">
							<div class="row justify-content-center mb-3">
								<div class="col-xs-12 col-md-6 col-lg-4" style="text-align: center">
									<img src="{{asset('images/professional-woman-1.png')}}" class="photo-thumbnail photo-thumbnail-large mb-2"  style="height: 200px; width: 200px; border-radius: 200px;"/><br />
									<strong>Eleanor Rigby</strong><br />
									Gig Sponsor <br />
									<div class="btn-group btn-group-sm" role="group">
										<button type="button" class="btn btn-empty"><i class="fas fa-envelope"></i></button>
										<button type="button" class="btn btn-empty"><i class="fas fa-address-card"></i></button>
									</div>
								</div>
							</div>
							<div class="row justify-content-center mb-3">
								<div class="col-md-6 col-lg-4" style="text-align: center">
									<img src="{{asset('images/professional-man-2.png')}}" class="photo-thumbnail photo-thumbnail-large mb-2" style="height: 200px; width: 200px; border-radius: 200px;" /><br />
									<strong>Ronald McDonald</strong><br />
									Team Member 1<br />
									<div class="btn-group btn-group-sm" role="group">
										<button type="button" class="btn btn-empty"><i class="fas fa-envelope"></i></button>
										<button type="button" class="btn btn-empty"><i class="fas fa-address-card"></i></button>
									</div>
								</div>
								<div class="col-md-6 col-lg-4" style="text-align: center">
									<img src="{{asset('images/user.svg')}}" class="photo-thumbnail photo-thumbnail-large mb-2" style="height: 200px; width: 200px; border-radius: 200px;" /><br />
									<strong>Open Position</strong><br />
									Team Member 2<br />
								</div>
								<div class="col-md-6 col-lg-4" style="text-align: center">
									<img src="{{asset('images/user.svg')}}" class="photo-thumbnail photo-thumbnail-large mb-2" style="height: 200px; width: 200px; border-radius: 200px;" /><br />
									<strong>Open Position</strong><br />
									Team Member 3<br />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('footer_scripts')
	<!-- LIBRARIES -->
	<script src="{{asset('libs/jquery-3.2.1.slim.min.js')}}"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="{{asset('libs/popper.min.js')}}"></script>
	<script src="{{asset('libs/bootstrap-4.0.0/js/bootstrap.min.js')}}"></script>
@endsection