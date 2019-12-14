<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>gitClone</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--  <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
	<link rel="shortcut icon" href="{{url('public/img/backend/favicon.png')}}">
	<link rel="stylesheet" href="{{url('public/css/frontend/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('public/css/frontend/style.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div>
		<header id="header" class="header">
			<div class="top_header">
				<div class="container">
					<nav class="navbar navbar-expand-md navbar-light bg-default">
						<a class="navbar-brand" href="#">
							<img src="{{url('public/img/ITL_Logo2.png')}}" class="logo" alt="Logo">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end navigation_block" id="navbarNavDropdown">
							<ul class="navbar-nav menu">
								@if(!Auth::check() || Auth::user()->user_type == USER_ROLE_ADMIN)
								@else
									<li class="btn_block"><a href="{{ Route('logout') }}"><span class="btn-primary">Sign Out</span></a></li>
								@endif
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</header>
		@yield('content')
	</div>
	<div class="copy-right">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-6 text-left">
					<p><?php echo '&#169;&nbsp;'. date('Y') .'&nbsp;<a target="_blank" href="https://codetechniq.com/">Codetechniq</a>';?></p>
				</div>
				<div class="col text-right">
					<ul>
						<li><a target="_blank" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<body>

    <script src="{{url('public/js/frontend/jquery.min.js')}}"></script>
    <script src="{{url('public/js/frontend/popper.min.js')}}"></script>
    <script src="{{url('public/js/frontend/bootstrap.min.js')}}"></script>
    <script src="{{url('public/js/frontend/script.js')}}"></script>
</body>
</html>