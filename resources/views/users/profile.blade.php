@extends('layouts.static')

@section('title','User Profile')

@section('header_styles')
<!-- STYLES -->
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
	<style>
		body{
			background-color: #fff;
			max-height: 100%;
		}
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
		div#header > .text-secondary.active {
			color: #f6d448;
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
					<a class="text-secondary" href="#"><img src="{{asset(Auth::user()->picture)}}" height="30px" class="avatar"  style="border-radius: 30px;"/>&nbsp; {{Auth::user()->first_name . " " . Auth::user()->last_name}} <i class="fas fa-caret-down"></i></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile-dropdown-button">
						<a class="dropdown-item" href="{{url('users/'.Auth::id())}}"><small><i class="fas fa-fw fa-address-card"></i> Profile</small></a>
						<a class="dropdown-item" href="#"><small><i class="fas fa-fw fa-cogs"></i> Account Settings</small></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="gradient-bg gradient-bg-blue pt-3">
		<div class="container">
			<div class="row no-gutters align-items-stretch">
				<div class="col-12 col-sm-6 col-md-3 px-2 pb-3">
					<div class="card rounded-corners p-3 w-100" style="display: inline-block;">
						<div class="card-icon">
							<i class="fas fa-clock"></i>
						</div>
						<h2 class="text-primary mb-0"><strong>60</strong></h2>
						Impact Hours Contributed <i class="fas fa-question-circle small text-muted"></i>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-3 px-2 pb-3">
					<div class="card rounded-corners p-3 w-100" style="display: inline-block;">
						<div class="card-icon">
							<i class="far fa-newspaper"></i>
						</div>
						<h2 class="text-primary mb-0"><strong>10</strong></h2>
						Gigs Completed <i class="fas fa-question-circle small text-muted"></i>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-3 px-2 pb-3">
					<div class="card rounded-corners p-3 w-100" style="display: inline-block;">
						<div class="card-icon">
							<i class="far fa-check-square"></i>
						</div>
						<h2 class="text-primary mb-0"><strong>100</strong></h2>
						Skill Points <i class="fas fa-question-circle small text-muted"></i>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-3 px-2 pb-3">
					<div class="card rounded-corners p-3 w-100" style="display: inline-block;">
						<div class="card-icon">
							<i class="fas fa-users"></i>
						</div>
						<h2 class="text-primary mb-0"><strong>350</strong></h2>
						Impact Score <i class="fas fa-question-circle small text-muted"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-3 p-3">
				<div class="photo-container">
					<img src="{{asset($user->picture)}}"/>
				</div>
				<h2 class="mt-3">{{$user->first_name . ' ' . $user->last_name}}</h2>
				<div class="text-muted" style="line-height: 1.2;">
					<small class=""><i class="fas fa-fw fa-map-marker"></i>{{$user->location}}</small><br />
					<small class=""><i class="fas fa-fw fa-briefcase"></i>{{$user->role}}</small>
				</div>
				<button class="btn btn-sm btn-primary mt-3">
					<i class="fas fa-pencil-alt"></i> Edit Profile
				</button>
				<div class="divider my-3"></div>
				<strong>Skills</strong><br />
				<strong class="small">Website Design</strong>
				<div class="progress mt-1 mb-3">
				 	<div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<strong class="small">User Experience</strong>
				<div class="progress mt-1 mb-3">
				 	<div class="progress-bar" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<strong class="small">Python</strong>
				<div class="progress mt-1 mb-3">
				 	<div class="progress-bar" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<strong class="small">Adobe Illustrator</strong>
				<div class="progress mt-1 mb-3">
				 	<div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<div class="col-9 p-3">
				<div class="card bg-light rounded-corners mx-1 mb-3 p-2 flex-row justify-content-between">
					<div><strong>My Public Profile</strong></div>
					<div class="card flex-row align-items-center small px-2">
						<i class="fas fa-calendar"></i>&nbsp;<strong>April 15, 2018 - May 16, 2018</strong>
					</div>
				</div>
				<ul class="nav nav-tabs mx-1">
					<li class="nav-item">
						<a class="nav-link small active" href="#recentActivityTab" data-toggle="tab"><strong>Recent Activity</strong></a>
					</li>
					<li class="nav-item">
						<a class="nav-link small" href="#gigPortfolioTab" data-toggle="tab"><strong>Gig Portfolio</strong></a>
					</li>
					<li class="nav-item">
						<a class="nav-link small" href="#myAchievementsTab" data-toggle="tab"><strong>My Achievements</strong></a>
					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="recentActivityTab">
						<table class="table no-header" style="margin-top: -1px;">
							<tr>
								<td>
									<img class="photo-thumbnail" src="{{asset('images/professional-man-3.png')}}" />
								</td>
								<td width="100%">
									<h6 class="text-primary mb-0"><strong>IMAX Logo Design Project</strong></h6>
									<div class="small quote my-1">Thank you for signing up to help with the IMAX Logo Design project! We'll be kicking off on May 17th. Keep an eye out for a calendar invite!</div>
									<a href="#" class="">
										<i class="fas fa-fw fa-folder"></i> <small>Box Folder with IMAX Overview</small>
									</a>
								</td>
								<td>
									<div class="activity-date text-right ml-3">
										<h3 class="text-primary mb-0"><strong>14</strong></h3>
										<small>May</small>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<img class="photo-thumbnail" src="{{asset('images/professional-man-2.png')}}" />
								</td>
								<td width="100%">
									<h6 class="text-primary mb-0"><strong>Expertise Needed</strong></h6>
									<div class="small quote my-1">Hi Creative Crowd, I am seeking help with my anchors in Adobe Illustrator, please refer to the link below.</div>
									<a href="#" class="">
										<i class="fas fa-fw fa-hands-helping"></i> <small>Help Camden Hill with Adobe Illustrator</small>
									</a>
								</td>
								<td>
									<div class="activity-date text-right ml-3">
										<h3 class="text-primary mb-0"><strong>14</strong></h3>
										<small>May</small>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<img class="photo-thumbnail" src="{{asset('images/professional-woman-2.png')}}" />
								</td>
								<td width="100%">
									<h6 class="text-primary mb-0"><strong>VBA Macro for Shawnee Site</strong></h6>
									<div class="small quote my-1">
										<div class="quote me my-1">
											Completed VBA Macro for Shawnee Site
										</div>
									Thank you Tobi for your work on this project! We received your macro and it's working perfectly for our site. This is saving us almost an hour a day and it has made our Materials Leaders very happy. Thank you! Attached is a thank you note from our team.  -Ayushi</div>
									<a href="#" class="">
										<i class="fas fa-fw fa-link"></i> <small>View Thank You Note.doc</small>
									</a>
								</td>
								<td>
									<div class="activity-date text-right ml-3">
										<h3 class="text-primary mb-0"><strong>13</strong></h3>
										<small>May</small>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<img class="photo-thumbnail" src="{{asset('images/professional-woman-2.png')}}" />
								</td>
								<td width="100%">
									<h6 class="text-primary mb-0"><strong>VBA Macro for Shawnee Site</strong></h6>
									<div class="small quote my-1">
										<div class="quote me my-1">
											Started VBA Macro for Shawnee Site
										</div>
									Thank you for attending the kickoff call! The linked Box folder has everything you should need to get started. Please reach out if you have any questions and thank you for your help! -Ayushi</div>
									<a href="#" class="">
										<i class="fas fa-fw fa-link"></i> <small>Box Folder with VBA Macro for Shawnee Site</small>
									</a>
								</td>
								<td>
									<div class="activity-date text-right ml-3">
										<h3 class="text-primary mb-0"><strong>11</strong></h3>
										<small>May</small>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<img class="photo-thumbnail" src="{{asset('images/trophy-1.png')}}" />
								</td>
								<td width="100%">
									<h6 class="text-primary mb-0"><strong>You've earned a new Badge!</strong></h6>
									<div class="small quote my-1">
										<div class="quote my-1">
											Congratulations, Tobi! You've earned the badge: "Leading Contributor" for your location!
										</div>
									Well done! You will be receiving an Above and Beyond Award within 2-3 days. Thank you for being an active contributor on Creative Crowd!</div>
									<a href="#" class="">
										<i class="fas fa-fw fa-trophy"></i> <small>View Your Achievement!</small>
									</a>
								</td>
								<td>
									<div class="activity-date text-right ml-3">
										<h3 class="text-primary mb-0"><strong>11</strong></h3>
										<small>May</small>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<div role="tabpanel" class="tab-pane" id="gigPortfolioTab">
						<table class="table" id="gig_portfolio_table" width="100%" style="margin-top: -1px;">
						</table>
					</div>
					<div role="tabpanel" class="tab-pane p-3" id="myAchievementsTab">
						<div class="row align-items-stretch">
							<div class="col-12 col-md-6 col-lg-3 text-center">
								<div class="achievement mb-3">
									<div class="achievement-image mb-1">
										<img src="{{asset('images/award-badge-3.png')}}" class="img-fluid" />
									</div>
									<div class="text-uppercase">Region Champion - USA</div>
									<span class="small">#1 Contributor in your Region</span>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3 text-center">
								<div class="achievement mb-3">
									<div class="achievement-image mb-1">
										<img src="{{asset('images/badge-target-4.png')}}" class="img-fluid" />
									</div>
									<div class="text-uppercase">First Time Host</div>
									<span class="small">Hosted your first project!</span>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3 text-center">
								<div class="achievement mb-3">
									<div class="achievement-image mb-1">
										<img src="{{asset('images/mountain-goal-2.png')}}" class="img-fluid" />
									</div>
									<div class="text-uppercase">Mount Everest Status</div>
									<span class="small">You've completed 10 Gigs</span>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3 text-center">
								<div class="achievement mb-3">
									<div class="achievement-image mb-1">
										<img src="{{asset('images/trophy-1.png')}}" class="img-fluid" />
									</div>
									<div class="text-uppercase">Star Contributor</div>
									<span class="small">100% Sponsor Satisfaction Streak 10+</span>
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
	<script
			src="{{asset('libs/jquery-3.3.1.min.js')}}"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous"></script>

	<script src="{{asset('js/your-profile.js')}}"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="{{asset('libs/popper.min.js')}}"></script>
	<script src="{{asset('libs/bootstrap-4.0.0/js/bootstrap.min.js')}}"></script>

	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>

@endsection