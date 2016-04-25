<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>Learn Laravel 5</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ URL::to('/assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
	<link href="{{ URL::to('/assets/css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
	<link href="{{ URL::to('/assets/css/demo.css') }}" rel="stylesheet" media="screen">
	<link href="{{ URL::to('/css/lbt.css') }}" rel="stylesheet" media="screen">
 <link href="/css/app.css" rel="stylesheet">
  
	

	<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href='http://fonts.useso.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	

  </head>
  <body>

  	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/admin">Learn Laravel 5</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/order">My order</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="#">To add</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">Login</a></li>
						<li><a href="/auth/register">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/apply">Apply</a></li>
								<li><a href="/auth/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
  <div class="container" style="margin-top: 20px;">

  		@yield('page')
  	</div>

  	<script src="{{ URL::to('/assets/js/jquery.min.js') }}"></script>
  	<script src="{{ URL::to('/assets/js/bootstrap.min.js') }}"></script>

  	<script type="text/javascript">
  		$('.tip').tooltip();
  	</script>

  	
	<script src="/js/lbt.js" ></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  	

  </body>
  </html>
