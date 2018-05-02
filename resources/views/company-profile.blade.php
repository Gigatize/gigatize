@extends('layouts.static')

@section('title','Company Profile')

@section('header_styles')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<!-- D3 -->
<!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
@endsection

<body class="gradient-bg gradient-bg-blue">
	<div class="container">
		<div class="row no-gutters align-items-stretch mt-3">
			<div class="col-12 col-md-8 col-lg-9">
				<div class="card no-rounded-corners no-border mr-3 p-3">
					<div class="card no-rounded-corners p-3">
						<strong>
							Our Global Community
							<div class="btn-group float-right mb-1" role="group">
								<button type="button" class="btn btn-sm btn-empty" title="Settings"><i class="fas fa-wrench"></i></button>
							</div>
						</strong>
						<div class="divider"></div>
						<div class="row align-items-stretch">
							<div class="col-12 col-lg-4">
								<table class="table table-sm table-hover no-header no-footer" id="global_community_table" width="100%">
									<thead>
										<tr>
											<th>Country</th>
											<th>%</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="col-12 col-lg-8">
								<div id="global_community_container" class="mt-1">
									<div id="global_community"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-4 col-lg-3">
				<div class="card no-rounded-corners no-border p-3" style="height: 383px;">
					<div class="card no-rounded-corners p-3">
						<strong>
							Top Gigatizers
							<div class="btn-group float-right mb-1" role="group">
								<button type="button" class="btn btn-sm btn-empty" title="Settings"><i class="fas fa-wrench"></i></button>
							</div>
						</strong>
						<div class="divider"></div>
						<table class="table table-sm table-striped table-hover no-header no-footer" id="top_gigatizers_table" width="100%">
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card no-rounded-corners no-border mt-3 p-3">
			<strong>
				This Month's Gigs in Progress
				<div class="btn-group float-right mb-1" role="group">
					<button type="button" class="btn btn-sm btn-empty" title="Settings"><i class="fas fa-wrench"></i></button>
				</div>
			</strong>
			<div class="divider"></div>
			<table class="table table-sm table-striped table-hover no-footer" id="this_months_gigs_table" width="100%">
				<thead>
					<tr class="small">
						<th>ID</th>
						<th>Name</th>
						<th>Team Members</th>
						<th>Gig Progress</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
@section('footer_scripts')
	<!-- LIBRARIES -->
	<script
			src="{{asset('libs/jquery-3.3.1.min.js')}}"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="{{asset('libs/bootstrap-4.0.0/js/bootstrap.min.js')}}"></script>
	<!-- <script src="https://d3js.org/d3.v5.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
	<script src="{{asset('libs/datamaps.world.min.js')}}"></script>
	<script src="{{asset('js/global-community.js')}}"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
@endsection