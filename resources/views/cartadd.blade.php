﻿@extends('_layouts.default')

@section('title','加入购物车成功')

@section('content')

  
 <hr>
 <div class="container">
 
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
		    						{{$product->name}}
                    </div>
                    <div class="panel-body">
                        
                      <a href="#"><img class="pzl_size" src="{{$product->preview}}"/></a>
                                	<div style=" float: right; ">
                                        <p style="font-size: 120%;width:200px;"><img style="width:15%;margin-right:15px;"	src="/images/success.png">{{$result}}</p>
                                          <p style=" float: right;padding-top:70px ;"><b style="color:red;">小计: ￥{{$product->price}}</b><br/>购物车共有<span style="color:red;">{{count($cart_items)}}</span>件商品</p>
                                          <p><a href="/products/{{$product->id}}"class="btn  btn-danger">返回商品详情</a>
                                          <a href="/cart"Class="btn  btn-success ">去购物车结算</a></p>
                                    </div>

                                	
                                	                                
                                
                                
                      


                    </div>
                </div>
            </div>
        </div>
    </div>
  
  

@endsection
@section('m-js')

@endsection
