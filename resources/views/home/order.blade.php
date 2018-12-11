@extends('layout.home')

@section('title','好吃喵')

@section('content')
<link href="/home/style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/home/js/public.js"></script>
<script type="text/javascript" src="/home/js/jquery.js"></script>
<script type="text/javascript" src="/home/js/jqpublic.js"></script>
	<section class="Psection MT20" id="Cflow">
	    <!--如果用户未添加收货地址，则显示如下-->
	    <div class="confirm_addr_f">
	        <span class="flow_title">
	            收货地址：
	        </span>
	        <input type="text">	   
	         <span class="flow_title">
	            收货电话：
	        </span>
	        <input type="text">	     	        
	    	<!--配送方式及支付，则显示如下-->
	   		<!--check order or add other information-->
	     	<form action="#">
	        <div class="inforlist">
	            <span class="flow_title">
	                商品清单
	            </span>
	            <table>
	                <th>
	                    名称
	                </th>
	                <th>
	                    数量
	                </th>
	                <th>
	                    价格
	                </th>
	                <th>
	                    小计
	                </th>
	                <tr>
	                    <td>
	                        酸辣土豆丝
	                    </td>
	                    <td>
	                        2
	                    </td>
	                    <td>
	                        ￥59
	                    </td>
	                    <td>
	                        ￥118
	                    </td>
	                </tr>
	            </table>
	            <div class="Order_M">
	                <p>
	                    <em>
	                        订单附言:
	                    </em>
	                    <input name="" type="text">
	                </p>
	            </div>
	            <div class="Sum_infor">
	                <p class="p1">
	                    商品费用：￥177.00
	                </p>
	                <p class="p2">
	                    合计：
	                    <span>
	                        ￥167.00
	                    </span>
	                </p>
	                <input type="submit" value="提交订单" / class="p3button">
	            </div>
	        </div>
	   	    </form>
	    </div>
    </section>

	<script>
		//Test code,You can delete this script /2014-9-21DeathGhost/
		$(document).ready(function(){
			var submitorder =$.noConflict();
			submitorder(".p3button").click(function(){
				submitorder("#Cflow").hide();
		   	    submitorder("#Aflow").show();
			});
		});
	</script>
	<section class="Psection MT20 Textcenter" style="display:none;" id="Aflow">
	    <!-- 订单提交成功后则显示如下 -->
	    <p class="Font14 Lineheight35 FontW">恭喜你！订单提交成功！</p>
	    <p class="Font14 Lineheight35 FontW">您的订单编号为：<span class="CorRed">201409205134</span></p>
	    <p class="Font14 Lineheight35 FontW">共计金额：<span class="CorRed">￥359</span></p>
	    <p><button type="button" class="Lineheight35"><a href="#" target="_blank">支付宝立即支付</a></button><button type="button" class="Lineheight35"><a href="user_center.html">进入用户中心</button></p>
	</section>
	<!--End content-->

@stop
