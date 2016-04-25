@extends('_layouts.default')

@section('title','我的购物车')

@section('content')
   <ul class="pzl_">
        <li><a class="pzl_a" href="#home">我的购物车</a></li>
        <li><a class="pzl_a "href="#news">我的订单</a></li>
        <li><a class="pzl_a "href="#news">我的收货地址</a></li>
        <li><a class="pzl_a "href="#about">我的收藏</a></li>
        <li><a class="pzl_a "href="#news">我的评论</a></li>
       
    </ul>
    <div class="container">
 
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#"><img src="/images/user.png"></a>
		    	<a href="#">( {{  Auth::user()->name}} )</a>
                    </div>
                    <div class="panel-body">
                        @foreach ($cart_items as $cart_item)
                        @can ('update-cart_item',$cart_item)
                               <hr>
                         <div class="cart_item">
                          	<input type="checkbox" >
                          	<a href="#"><img style="width:20%;"	 src="{{$cart_item->product->preview}}"/></a>
                          	<div class="pzl_cart" >
						                    是款的来看撒娇的考虑就爱健康的就是肯定就是靠大家
						                </div>                                     
                         </div>
                                    
                               
                        @endcan
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('m-js')

@endsection
