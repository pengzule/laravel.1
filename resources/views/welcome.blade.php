 @extends('_layouts.default')
@section('content')
	<div id="content">
		<div class="showbox" >

		</div>

        </div>
	<div class="weui_cells weui_cells_access">
		@foreach($products as $product)
			<a class="weui_cell" href="#">
				<div class="weui_cell_hd"><img class="bk_preview" src="/images/2.jpg"></div>
				<div class="weui_cell_bd weui_cell_primary">
					<div style="margin-bottom: 10px;">
						<span class="bk_title">{{$product->name}}</span>
						<span class="bk_price" style="float: right;">￥ {{$product->price}}</span>
					</div>

					<p class="bk_summary">{{$product->summary}}</p>
				</div>
				<div class="weui_cell_ft"></div>
			</a>
		@endforeach
	</div>
@endsection
