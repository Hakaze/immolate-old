<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Immolate
			@show
		</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Jon Doe" />
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
		<link href="{{{ asset('assets/css/bootstrap.min.css') }}}" rel="stylesheet">
		<link href="{{{ asset('assets/css/font-awesome.min.css') }}}" rel="stylesheet">
		<link href="{{{ asset('assets/css/app.css') }}}" rel="stylesheet">
		<link href="{{{ asset('assets/css/bootstrap-responsive.min.css') }}}" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
	</head>

	<body>
		<!-- Navbar -->
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="#" name="top">Immolate</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li {{{ Request::is('/') ? 'class=active' : '' }}}>
								<a href="{{{ URL::to('') }}}"><i class="icon-home "></i> Soulbinders</a>
							</li>
						</ul>
						<ul class="nav pull-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{ Auth::user()->player_name }}}<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{{ URL::to('account') }}}"><i class='icon-cog'></i> Account Settings</a>
									</li>
									<li>
										<a href="{{{ URL::to('account/logout') }}}"><i class="icon-off"></i> Logout</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					<!--/.nav-collapse -->
				</div>
				<!--/.container -->
			</div>
		</div>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container">
			<div class="row">
				<div class="span12">

					<!-- Notifications -->
					@include('notifications')
					<!-- ./ notifications -->

					<!-- Content -->
					@yield('content')
					<!-- ./ content -->
				</div><!--/.span-->
			</div><!--/row-->

			<hr>

			<footer>
				<p>&copy; Immolate 2013</p>
			</footer>

		</div><!--/.fluid-container-->

		<!-- Javascripts
		================================================== -->
		<script src="{{{ asset('assets/js/jquery-1.9.1.min.js') }}}"></script>
		<script src="{{{ asset('assets/js/bootstrap/bootstrap.min.js') }}}"></script>
		<script src="{{{ asset('assets/js/app/app.js') }}}"></script>		
	</body>
</html>
