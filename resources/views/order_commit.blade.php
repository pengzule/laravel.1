@extends('_layouts.default1')

<<<<<<< HEAD
@section('title','订单确认')
=======
@section('title', '订单')
>>>>>>> 564690fdba7db4f42449f535a0325a8dc96f8210

@section('content')

        <!--收货地址body部分开始-->
<div class="border_top_cart">
    <script type="text/javascript">
        var checkoutConfig={
            addressMatch:'common',
            addressMatchVarName:'data',
            hasPresales:false,
            hasBigTv:false,
            hasAir:false,
            hasScales:false,
            hasGiftcard:false,
            totalPrice:244.00,
            postage:10,//运费
            postFree:true,//活动是否免邮了
            bcPrice:150,//计算界值
            activityDiscountMoney:0.00,//活动优惠
            showCouponBox:0,
            invoice:{
                NA:"0",
                personal:"1",
                company:"2",
                electronic:"4"
            }
        };
        var miniCartDisable=true;
    </script>
    <div class="container">
        <div class="checkout-box">
            <form  id="checkoutForm" action="#" method="post">
                <div class="checkout-box-bd">
                    <!-- 地址状态 0：默认选择；1：新增地址；2：修改地址 -->
                    <input type="hidden" name="Checkout[addressState]" id="addrState"   value="0">
                    <!-- 收货地址 -->
                    <div class="xm-box">
                        <div class="box-hd ">
                            <h2 class="title">收货地址</h2>
                            <!---->
                        </div>
                        <div class="box-bd">
                            <div class="clearfix xm-address-list" id="checkoutAddrList">
                                <dl class="item" >
                                    <dt>
                                        <strong class="itemConsignee">彭祖乐</strong>
                                        <span class="itemTag tag">学校</span>
                                    </dt>
                                    <dd>
                                        <p class="tel itemTel">12345678911</p>
                                        <p class="itemRegion">福建 福州市 仓山区</p>
                                        <p class="itemStreet">福建农林大学(350000)</p>
                                        <span class="edit-btn J_editAddr">编辑</span>
                                    </dd>
                                    <dd style="display:none">
                                        <input type="radio" name="Checkout[address]" class="addressId"  value="10140916720030323">
                                    </dd>
                                </dl>
                                <div class="item use-new-addr"  id="J_useNewAddr" data-state="off">
                                    <span class="iconfont icon-add"><img src="images/add_cart.png" /></span>
                                    使用新地址
                                </div>
                            </div>
                            <input type="hidden" name="newAddress[type]" id="newType" value="common">
                            <input type="hidden" name="newAddress[consignee]" id="newConsignee">
                            <input type="hidden" name="newAddress[province]" id="newProvince">
                            <input type="hidden" name="newAddress[city]" id="newCity">
                            <input type="hidden" name="newAddress[district]" id="newCounty">
                            <input type="hidden" name="newAddress[address]" id="newStreet">
                            <input type="hidden" name="newAddress[zipcode]" id="newZipcode">
                            <input type="hidden" name="newAddress[tel]" id="newTel">
                            <input type="hidden" name="newAddress[tag_name]" id="newTag">
                            <!--点击弹出新增/收货地址界面start-->
                            <div class="xm-edit-addr-box" id="J_editAddrBox">
                                <div class="bd">
                                    <div class="item">
                                        <label>收货人姓名<span>*</span></label>
                                        <input type="text" name="userAddress[consignee]" id="Consignee" class="input" placeholder="收货人姓名" maxlength="15" autocomplete='off'>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>联系电话<span>*</span></label>
                                        <input type="text" name="userAddress[tel]" class="input" id="Telephone" placeholder="11位手机号" autocomplete='off'>
                                        <p class="tel-modify-tip" id="telModifyTip"></p>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>地址<span>*</span></label>
                                        <select name="userAddress[province]" id="Provinces" class="select-1">
                                            <option>省份/自治区</option>
                                        </select>
                                        <select name="userAddress[city]"  id="Citys" class="select-2" disabled>
                                            <option>城市/地区/自治州</option>
                                        </select>
                                        <select name="userAddress[county]"  id="Countys" class="select-3" disabled>
                                            <option>区/县</option>
                                        </select>
                                        <textarea   name="userAddress[street]" class="input-area" id="Street" placeholder="路名或街道地址，门牌号"></textarea>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>邮政编码<span>*</span></label>
                                        <input type="text" name="userAddress[zipcode]" id="Zipcode" class="input" placeholder="邮政编码"  autocomplete='off'>
                                        <p class="zipcode-tip" id="zipcodeTip"></p>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>地址标签<span>*</span></label>
                                        <input type="text" name="userAddress[tag]" id="Tag" class="input" placeholder='地址标签：如"家"、"公司"。限5个字内'  >
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                </div>
                                <div class="ft clearfix">
                                    <button  type="button"  class="btn btn-lineDake btn-small " id="J_editAddrCancel">取消</button>
                                    <button type="button" class="btn btn-primary  btn-small " id="J_editAddrOk">保存</button>
                                </div>
                            </div>
                            <!--点击弹出新增/收货地址界面end-->
                            <div class="xm-edit-addr-backdrop" id="J_editAddrBackdrop"></div>
                        </div>                </div>
                    <!-- 收货地址 END-->
                    <div id="checkoutPayment">
                        <!-- 支付方式 -->
                        <div class="xm-box">
                            <div class="box-hd ">
                                <h2 class="title">支付方式</h2>
                            </div>
                            <div class="box-bd">
                                <ul id="checkoutPaymentList" class="checkout-option-list clearfix J_optionList">
                                    <li class="item selected">
                                        <input type="radio" name="Checkout[pay_id]" checked="checked" value="1">
                                        <p>
                                            在线支付                                <span></span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- 支付方式 END-->
                        <div class="xm-box">
                            <div class="box-hd ">
                                <h2 class="title">配送方式</h2>
                            </div>
                            <div class="box-bd">
                                <ul id="checkoutShipmentList" class="checkout-option-list clearfix J_optionList">
                                    <li class="item selected">
                                        <input type="radio" data-price="0" name="Checkout[shipment_id]" checked="checked" value="1">
                                        <p>
                                            快递配送（免运费）                                <span></span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- 配送方式 END-->                    <!-- 配送方式 END-->
                    </div>
                    <!-- 送货时间 -->
                    <div class="xm-box">
                        <div class="box-hd">
                            <h2 class="title">送货时间</h2>
                        </div>
                        <div class="box-bd">
                            <ul class="checkout-option-list clearfix J_optionList">
                                <li class="item selected"><input type="radio" checked="checked" name="Checkout[best_time]" value="1"><p>不限送货时间<span>周一至周日</span></p></li><li class="item "><input type="radio"  name="Checkout[best_time]" value="2"><p>工作日送货<span>周一至周五</span></p></li><li class="item "><input type="radio"  name="Checkout[best_time]" value="3"><p>双休日、假日送货<span>周六至周日</span></p></li>                        </ul>
                        </div>
                    </div>
                    <!-- 送货时间 END-->
                    <!-- 发票信息 -->
                    <div id="checkoutInvoice">
                        <div class="xm-box">
                            <div class="box-hd">
                                <h2 class="title">发票信息</h2>
                            </div>
                            <div class="box-bd">
                                <ul class="checkout-option-list checkout-option-invoice clearfix J_optionList J_optionInvoice">
                                    <li class="hide">
                                        电子个人发票4
                                    </li>
                                    <li class="item selected">
                                        <!--<label><input type="radio"  class="needInvoice" value="0" name="Checkout[invoice]">不开发票</label>-->
                                        <input type="radio"    checked="checked"  value="4" name="Checkout[invoice]">
                                        <p>电子发票（非纸质）</p>
                                    </li>
                                    <li class="item ">
                                        <input type="radio"   value="1" name="Checkout[invoice]">
                                        <p>普通发票（纸质）</p>
                                    </li>
                                </ul>
                                <p id="eInvoiceTip" class="e-invoice-tip ">
                                    电子发票是税务局认可的有效凭证，可作为售后维权凭据，不随商品寄送。开票后不可更换纸质发票，如需报销请选择普通发票。<a href="http://bbs.xiaomi.cn/thread-9285999-1-1.html" target="_blank">什么是电子发票？</a>
                                </p>
                                <div class="invoice-info nvoice-info-1" id="checkoutInvoiceElectronic" style="display:none;">

                                    <p class="tip">电子发票目前仅对个人用户开具，不可用于单位报销 ，不随商品寄送</p>
                                    <p>发票内容：购买商品明细</p>
                                    <p>发票抬头：个人</p>
                                    <p>
                                        <span class="hide"><input type="radio" value="4" name="Checkout[invoice_type]"   checked="checked"   id="electronicPersonal" class="invoiceType"></span>
                                    <dl>
                                        <dt>什么是电子发票?</dt>
                                        <dd>&#903; 电子发票是纸质发票的映像，是税务局认可的有效凭证，与传统纸质发票具有同等法律效力，可作为售后维权凭据。</dd>
                                        <dd>&#903; 开具电子服务于个人，开票后不可更换纸质发票，不可用于单位报销。</dd>
                                        <dd>&#903; 您在订单详情的"发票信息"栏可查看、下载您的电子发票。<a href="http://bbs.xiaomi.cn/thread-9285999-1-1.html" target="_blank">什么是电子发票？</a></dd>
                                    </dl>
                                    </p>
                                </div>
                                <div class="invoice-info invoice-info-2" id="checkoutInvoiceDetail"  style="display:none;" >
                                    <p>发票内容：购买商品明细</p>
                                    <p>
                                        发票抬头：请确认单位名称正确,以免因名称错误耽搁您的报销。注：合约机话费仅能开个人发票
                                    </p>
                                    <ul class="type clearfix J_invoiceType">
                                        <li class="hide">
                                            <input type="radio" value="0" name="Checkout[invoice_type]" id="noNeedInvoice" >
                                        </li>
                                        <li class="">
                                            <input  class="invoiceType" type="radio" id="commonPersonal" name="Checkout[invoice_type]" value="1" >
                                            个人
                                        </li>
                                        <li class="">
                                            <input  class="invoiceType" type="radio" name="Checkout[invoice_type]" value="2" >
                                            单位
                                        </li>
                                    </ul>
                                    <div  id='CheckoutInvoiceTitle' class=" hide  invoice-title">
                                        <label for="Checkout[invoice_title]">单位名称：</label>
                                        <input name="Checkout[invoice_title]" type="text" maxlength="49" value="" class="input"> <span class="tip-msg J_tipMsg"></span>
                                    </div>

                                </div>

                            </div>
                        </div>                </div>
                    <!-- 发票信息 END-->
                </div>
                <div class="checkout-box-ft">
                    <!-- 商品清单 -->
                    <div id="checkoutGoodsList" class="checkout-goods-box">
                        <div class="xm-box">
                            <div class="box-hd">
                                <h2 class="title">确认订单信息</h2>
                            </div>
                            <div class="box-bd">
                                <dl class="checkout-goods-list">
                                    <dt class="clearfix">
                                        <span class="col col-1">商品名称</span>
                                        <span class="col col-2">购买价格</span>
                                        <span class="col col-3">购买数量</span>
                                        <span class="col col-4">小计（元）</span>
                                    </dt>
                                    <dd class="item clearfix">
                                        <div class="item-row">
                                            <div class="col col-1">
                                                <div class="g-pic">
                                                    <img src="http://i1.mifile.cn/a1/T11lLgB5YT1RXrhCrK!40x40.jpg" srcset="http://i1.mifile.cn/a1/T11lLgB5YT1RXrhCrK!80x80.jpg 2x" width="40" height="40" />
                                                </div>
                                                <div class="g-info">
                                                    <a href="http://item.mi.com/1151500067.html" target="_blank">
                                                        小米T恤 忍者米兔双截棍 军绿 XXL                                            </a>
                                                </div>
                                            </div>

                                            <div class="col col-2">39元</div>
                                            <div class="col col-3">1</div>
                                            <div class="col col-4">39元</div>
                                        </div>
                                    </dd>
                                    <dd class="item clearfix">
                                        <div class="item-row">
                                            <div class="col col-1">
                                                <div class="g-pic">
                                                    <img src="http://i1.mifile.cn/a1/T14BLvBKJT1RXrhCrK!40x40.jpg" srcset="http://i1.mifile.cn/a1/T14BLvBKJT1RXrhCrK!80x80.jpg 2x" width="40" height="40" />
                                                </div>
                                                <div class="g-info">
                                                    <a href="http://item.mi.com/1151500061.html" target="_blank">
                                                        招财猫米兔 白色                                            </a>
                                                </div>
                                            </div>

                                            <div class="col col-2">49元</div>
                                            <div class="col col-3">1</div>
                                            <div class="col col-4">49元</div>
                                        </div>
                                    </dd>
                                    <dd class="item clearfix">
                                        <div class="item-row">
                                            <div class="col col-1">
                                                <div class="g-pic">
                                                    <img src="http://i1.mifile.cn/a1/T1rrDgB4DT1RXrhCrK!40x40.jpg" srcset="http://i1.mifile.cn/a1/T1rrDgB4DT1RXrhCrK!80x80.jpg 2x" width="40" height="40" />
                                                </div>
                                                <div class="g-info">
                                                    <a href="http://item.mi.com/1151400031.html" target="_blank">
                                                        小米圆领纯色T恤 男款 红色 XXL                                            </a>
                                                </div>
                                            </div>

                                            <div class="col col-2">39元</div>
                                            <div class="col col-3">4</div>
                                            <div class="col col-4">156元</div>
                                        </div>
                                    </dd>
                                </dl>
                                <div class="checkout-count clearfix">
                                    <div class="checkout-count-extend xm-add-buy">
                                        <h3 class="title">会员留言</h2></br>
                                            <input type="text" />

                                    </div>
                                    <!-- checkout-count-extend -->
                                    <div class="checkout-price">
                                        <ul>

                                            <li>
                                                订单总额：<span>244元</span>
                                            </li>
                                            <li>
                                                活动优惠：<span>-0元</span>
                                                <script type="text/javascript">
                                                    checkoutConfig.activityDiscountMoney=0;
                                                    checkoutConfig.totalPrice=244.00;
                                                </script>
                                            </li>
                                            <li>
                                                优惠券抵扣：<span id="couponDesc">-0元</span>
                                            </li>
                                            <li>
                                                运费：<span id="postageDesc">0元</span>
                                            </li>
                                        </ul>
                                        <p class="checkout-total">应付总额：<span><strong id="totalPrice">244</strong>元</span></p>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>



                        <!--S 保障计划 产品选择弹框 -->


                    </div>
                    <!-- 商品清单 END -->
                    <input type="hidden"  id="couponType" name="Checkout[couponsType]">
                    <input type="hidden" id="couponValue" name="Checkout[couponsValue]">
                    <div class="checkout-confirm">

                        <a href="#" class="btn btn-lineDakeLight btn-back-cart">返回购物车</a>
                        <input type="submit" class="btn btn-primary" value="立即下单" id="checkoutToPay" />
                    </div>
                </div>
        </div>

        </form>

    </div>






    <!-- 保险弹窗 -->
    <!-- 保险弹窗 -->




    <script src="js/base.min.js"></script>

    <script type="text/javascript" src="js/address_all.js"></script>
    <script type="text/javascript" src="js/checkout.min.js"></script>
</div>

<!--收货地址body部分结束-->

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
