﻿@extends('_layouts.default')

@section('title','我的购物车')

@section('content')


            <div class="gwc" style=" margin:auto;">
                <table cellpadding="0" cellspacing="0" class="gwc_tb1">
                    <tr>
                        <td class="tb1_td1"><input type="checkbox"  onclick="selectAll()"></td>
                        <td class="tb1_td2"></td>
                        <td class="tb1_td3"></td>
                        <td class="tb1_td4">单价</td>
                        <td class="tb1_td5">数量</td>
                        <td class="tb1_td6">小计</td>
                        <td class="tb1_td7">操作</td>
                    </tr>
                </table>
                @foreach ($cart_items as $cart_item)
                <table cellpadding="0" cellspacing="0" class="gwc_tb2">
                    <tr>
                        <td class="tb2_td1"><input type="checkbox"  name="cart_item"  id="{{$cart_item->product->id}}" /></td>
                        <td class="tb2_td2"><a href="#"><img src="{{$cart_item->product->preview}}"/></a></td>
                        <td class="tb2_td3"><a href="#">{{$cart_item->product->name}}</a></td>
                        <td class="tb1_td4">{{$cart_item->product->price}}</td>
                        <td class="tb1_td5">
                            <input id="min1" name=""  style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="-" />
                            <input id="text_box1" name="" type="text" value="{{$cart_item->count}}" style=" width:30px; text-align:center; border:1px solid #ccc;" />
                            <input id="add1" name="" style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="+" />
                        </td>
                        <td class="tb1_td6"><label id="total1" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"> {{$cart_item->product->price * $cart_item->count}}</label></td>
                        <td class="tb1_td7"><a href="#">删除</a></td>
                    </tr>
                </table>
                @endforeach
                <table cellpadding="0" cellspacing="0" class="gwc_tb3">
                    <tr>
                        <td class="tb1_td1"><input onclick="selectAll()" type="checkbox" /></td>
                        <td onclick="selectAll()"><label>全选</label></td>
                        <td class="tb3_td2">已选商品 <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;">0</label> 件</td>
                        <td class="tb3_td3">合计(不含运费):<span>￥</span><span style=" color:#ff5500;"><label id="zong1" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></span></td>
                        <td onclick="_toCharge()" class="tb3_td4"><span id="jz1">结算</span><a href="#" style="  display:none;"  class="jz2" id="jz2">结算</a></td>
                    </tr>
                </table>
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

            $('.gwc_tb3').posfixed({
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
