@extends('_layouts.default')

@section('content')
	<div id="title" style="text-align: center;">
		<div class="showbox">
			<div class="imagebox">
				<img src="http://www.itxueyuan.org/uploads/javascript/demo/lunbo/zuoyou_title/images/1.jpg" alt="1.jpg">
				<img src="http://www.itxueyuan.org/uploads/javascript/demo/lunbo/zuoyou_title/images/2.jpg" alt="2.jpg">
				<img src="http://www.itxueyuan.org/uploads/javascript/demo/lunbo/zuoyou_title/images/3.jpg" alt="3.jpg">
				<img src="http://www.itxueyuan.org/uploads/javascript/demo/lunbo/zuoyou_title/images/4.jpg" alt="4.jpg">
			</div>
			<div class="icobox">
				<span rel="0" class="active">0</span>
				<span rel="1">1</span>
				<span rel="2">2</span>
				<span rel="3">3</span>
			</div>
		</div>


	</div>
	<hr>
	













	<div id="content">
		<ul>
			@foreach ($pages as $page)
			<li style="margin: 50px 0;">
				<div class="title">
					<a href="{{ URL('pages/'.$page->id) }}">
						<h4>{{ $page->title }}</h4>
					</a>
				</div>
				<div class="body">
					<p>{{ $page->body }}</p>
				</div>
			</li>
			@endforeach
		</ul>
	</div>


@endsection
