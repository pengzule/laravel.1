﻿@extends('_layouts.default')

@section('title','我的购物车')

@section('content')

    <div class="container">

        <div class="row">

            <ul class="pzl_">
                <li><a class="pzl_a" href="#home">我的购物车</a></li>
                <li><a class="pzl_a "href="#news">我的订单</a></li>
                <li><a class="pzl_a "href="#news">我的收货地址</a></li>
                <li><a class="pzl_a "href="#about">我的收藏</a></li>
                <li><a class="pzl_a "href="#news">我的评论</a></li>

            </ul>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#"><img src="/images/user.png"></a>
		    	        {{--<a href="#">( {{  Auth::user()->name}} )</a>--}}
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr class="row">
                                <th class="col-lg-2"><input type="checkbox"  onclick="selectAll()" ></th>
                                <th class="col-lg-3"></th>
                                <th class="col-lg-2">单价</th>
                                <th class="col-lg-2">数量</th>
                                <th class="col-lg-2">合计</th>
                                <th class="col-lg-3">操作</th>
                            </tr>
                             @foreach ($cart_items as $cart_item)
                                <tr class="row" >
                                    <div class="pzl_flash">
                                        <div class="pzl_flash_">
                                            <input type="checkbox"  onclick="selectAll()" >
                                        </div>
                                        <div class="pzl_flash_" id="opt1" >
                                            <a href="javascript:"  onclick="selectAll()" >全选 </a>
                                        </div>
                                        <div class="pzl_flash_">
                                            批量删除

                                        </div>
                                        <div class="pzl_flash_1">
                                           <a class="btn btn-danger" onclick="_toCharge()" >确认结算</a>
                                        </div>
                                    </div>
                                    <td>
                                        <input type="checkbox"  name="cart_item"  id="{{$cart_item->product->id}}">
                                        <a href="#"><img style="width:85%;"	 src="{{$cart_item->product->preview}}"/></a>
                                    </td>
                                    <td  style="padding-top: 20px;">
                                        <div style="width: 150px;word-wrap:break-word;">{{$cart_item->product->name}}</div>
                                    </td>
                                    <td style="padding-top: 20px;">
                                        ¥ {{$cart_item->product->price}}
                                    </td>
                                    <td style="padding-top: 20px;">
                                       {{$cart_item->count}}
                                    </td>
                                    <td style="padding-top: 20px;">
                                        {{$cart_item->product->price * $cart_item->count}}
                                    </td>
                                    <td style="padding-top: 20px;">
                                        <div style="float: right">
                                            <a href="">移入收藏</a><br/> <button  onclick="_onDelete();">删除</button>
                                        </div>
                                    </td>
                                </tr>
                             @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('my-js')
    <script type="text/javascript">
        function selectAll(){
            var a = document.getElementsByTagName("input");
            if(a[0].checked){
                for(var i = 0;i<a.length;i++){
                    if(a[i].type == "checkbox") a[i].checked = false;
                }
            }
            else{
                for(var i = 0;i<a.length;i++){
                    if(a[i].type == "checkbox") a[i].checked = true;
                }
            }
        }
        $(function(){
            $('.pzl_nav').posfixed({
                distance : 0,
                pos : 'top',
                type : 'while',
                hide : false
            });

            $('.gotop').posfixed({
                distance : 10,
                direction : 'bottom',
                type : 'always',
                tag : {
                    obj : $('.wrap'),
                    direction : 'right',
                    distance : 10
                },
                hide : true
            });
        });



        function _toCharge() {
            var product_ids_arr = [];
            $("input[name='cart_item']:checked").each(function () {
                product_ids_arr.push($(this).attr('id'));
            });

            if(product_ids_arr.length == 0) {
                alert('请选择提交项');
                return;
            }

            // 如果是微信浏览器
            var is_wx = 0;
            var ua = navigator.userAgent.toLowerCase();//获取判断用的对象
            if (ua.match(/MicroMessenger/i) == "micromessenger") {
                is_wx = 1;
            }

            location.href = '/order_commit?product_ids=' + product_ids_arr + '&is_wx=' + is_wx;
            // $('input[name=product_ids]').val(product_ids_arr+'');
            // $('input[name=is_wx]').val(is_wx+'');
            // $('#order_commit').submit();
        }

        function _onDelete() {
            var product_ids_arr = [];
            $("input[name='cart_item']:checked").each(function () {
                    product_ids_arr.push($(this).attr('id'));
            });
            if(product_ids_arr.length == 0) {
                alert('请选择删除项');
                return;
            }
            $.ajax({
                type: "GET",
                url: '/service/cart/delete',
                dataType: 'json',
                cache: false,
                data: {product_ids: product_ids_arr+''},
                success: function(data) {
                    if(data == null) {
                        alert('服务端错误');
                        return;
                    }
                    if(data.status != 0) {
                        alert(data.message);
                        return;
                    }
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }

    </script>


@endsection
