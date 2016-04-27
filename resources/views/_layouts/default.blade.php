<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" mrc="text/html; charset=gb2312">
  <title>@yield('title')</title>

  
	<link href="/css/lbt.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/pzl_lbt.css" rel="stylesheet">
	
  <!-- Fonts -->
	<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href='http://fonts.useso.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>



        <link href="{{ URL::to('/assets/css/bootstrap.min.css') }}" rel="stylesheet" >
	<link href="{{ URL::to('/assets/css/font-awesome.min.css') }}" rel="stylesheet">
	


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
				<a class="navbar-brand" href="/home">Learn Laravel 5</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					@if (! Auth::guest())
						<li><a href="/order">我的订单</a></li>
						<li><a href="#">待定</a></li>
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">登录</a></li>
						<li><a href="/auth/register">注册</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/admin">个人中心</a></li>
								<li><a href="/apply">我要开店</a></li>
								<li><a href="/auth/logout">退出</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
  <div class="container" style="margin-top: 20px;">
    @yield('content')
	<!-- Scripts -->


	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="posifixed.js" ></script>
	  <script src="/js/lbt.js" ></script>
	  <script src="/js/pzl_lbt.js"></script>
	  <script  src="/js/demo.js"></script>
    <div id="footer" style="text-align: center; border-top: dashed 3px #eeeeee; margin: 50px 0; padding: 10px;">
      ©2016 <a href="#">Pengzule</a>
    </div>
  </div>


</body>
@yield('my-js')

</html>
