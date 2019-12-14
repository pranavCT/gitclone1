<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keyword" content="">
		<title>Git Clone | Admin</title>
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
		<link rel="stylesheet" type="text/css" href="{{url('public/css/backend/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{url('public/css/backend/style-responsive.css')}}">
		<link rel="stylesheet" type="text/css" href="{{url('public/css/backend/simpleLightbox.min.css')}}">

		<script src="{{url('public/js/backend/jquery-3.2.1.min.js')}}"></script>
		<script type="text/javascript">
			var iBASEURL = '<?php echo env("APP_URL"); ?>';
		</script>
	</head>	
	<body>
		<section id="container">
			@if (Auth::check())
				<header class="header red-bg p-0">
					<div class="logo">
						<a href="{{url('admin/dashboard')}}" ><small>Git Clone</small></a>
						<span class="toggle-menu"><i class="fas fa-bars"></i></span>
					</div>
					<div class="top-menu">
					</div>
				</header>
				
				<div id="sidebar" class="nav-collapse">
					<div class="profile-admin">
						<img src="{{url('public/img/profile.png')}}">
						<div class="admin-details">
							<h2>{{ Auth::user()->name }}</h2>
							<h3>System Administrator</h3>
						</div>
						<div class="admin-action-button">
							<ul>
								<li>
									<a class="logout btn" href="{{url('admin/logout')}}" data-toggle="tooltip" data-placement="top" title="Log&nbsp;Out"><i class="fas fa-power-off"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>

					<ul class="sidebar-menu" id="nav-accordion">
						<li>
							<a class="{{ (Request::route()->getName() == 'admin-dashboard') ? 'active' : '' }}" href="{{URL::route('admin-dashboard')}}">
								<i class="fas fa-tachometer-alt"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="dropdown {{ Request::route()->getName() == 'admin-courses' || Request::route()->getName() == 'admin-add-course' || Request::route()->getName() == 'admin-edit-course' || Request::route()->getName() == 'admin-view-course' ? 'open' : '' }}">
							<a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle {{ Request::route()->getName() == 'admin-courses' || Request::route()->getName() == 'admin-add-course' || Request::route()->getName() == 'admin-edit-course' || Request::route()->getName() == 'admin-view-course' ? 'active' : '' }}">
								<i class="fa fa-users"></i>
								<span>Course Management</span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropdown {{ Request::route()->getName() == 'admin-courses' ? 'active' : '' }}" href="{{ Route('admin-courses') }}"><i class="fa fa-angle-right"></i> Manage Courses
									</a>
								</li>
								<li>
									<a class="{{ Request::route()->getName() == 'admin-add-course' ? 'active' : '' }}" href="{{Route('admin-add-course')}}"><i class="fa fa-angle-right"></i> Add New Course
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown {{ Request::route()->getName() == 'admin-course-materials' || Request::route()->getName() == 'admin-add-course-material' || Request::route()->getName() == 'admin-edit-course-material' || Request::route()->getName() == 'admin-view-course-material' ? 'open' : '' }}">
							<a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle {{ Request::route()->getName() == 'admin-course-materials' || Request::route()->getName() == 'admin-add-course-material' || Request::route()->getName() == 'admin-edit-course-material' || Request::route()->getName() == 'admin-view-course-material' ? 'active' : '' }}">
								<i class="fa fa-users"></i>
								<span>Course Material Management</span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropdown {{ Request::route()->getName() == 'admin-course-materials' ? 'active' : '' }}" href="{{ Route('admin-course-materials') }}"><i class="fa fa-angle-right"></i> Manage Course Material
									</a>
								</li>
								<li>
									<a class="{{ Request::route()->getName() == 'admin-add-course-material' ? 'active' : '' }}" href="{{Route('admin-add-course-material')}}"><i class="fa fa-angle-right"></i> Add New Course Material
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown {{ Request::route()->getName() == 'admin-users' || Request::route()->getName() == 'admin-add-user' || Request::route()->getName() == 'admin-edit-user' || Request::route()->getName() == 'admin-view-user' ? 'open' : '' }}">
							<a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle {{ Request::route()->getName() == 'admin-users' || Request::route()->getName() == 'admin-add-user' || Request::route()->getName() == 'admin-edit-user' || Request::route()->getName() == 'admin-view-user' ? 'active' : '' }}">
								<i class="fa fa-users"></i>
								<span>Users Management</span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropdown {{ Request::route()->getName() == 'admin-users' ? 'active' : '' }}" href="{{ Route('admin-users') }}"><i class="fa fa-angle-right"></i> Manage Users
									</a>
								</li>
								<li>
									<a class="{{ Request::route()->getName() == 'admin-add-user' ? 'active' : '' }}" href="{{Route('admin-add-user')}}"><i class="fa fa-angle-right"></i> Add New User
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			@endif

			<section class="<?php echo Auth::check() ? 'main-content' : ''; ?>">
				@yield('content')
			</section>
			
			@if (Auth::check())
				<footer class="site-footer">
					<p class="text-right"><?php echo '&#169;&nbsp;'. date('Y') .'&nbsp;<a target="_blank" href="https://codetechniq.com/">Codetechniq</a>';?>
					</p>
					<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
					<script defer src="{{url('public/js/backend/bootstrap.min.js')}}"></script>
					<script defer src="{{url('public/js/backend/jquery.dcjqaccordion.2.7.js')}}"></script>
					<script defer src="{{url('public/js/backend/common-scripts.js')}}"></script>
					<script defer src="{{url('public/js/backend/mdb.min.js')}}"></script>

					<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
					<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
					<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
					
					<script src="{{asset('public/js/backend/validation.js')}}"></script>
					
					<script type="text/javascript" src="{{url('public/js/backend/simpleLightbox.min.js')}}"></script>
					<script type="text/javascript">
						$(document).ready(function() {
					        $('div.alert-danger').delay(3000).slideUp(300);
					        $('div.alert-success').delay(3000).slideUp(300);
					    });
					</script>
				</footer>
			@endif
		</section>
	</body>
</html>