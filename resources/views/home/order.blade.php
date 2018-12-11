@extends('layout.home')

@section('title','好吃喵')

@section('content')
<link href="/home/style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/home/js/public.js"></script>
<script type="text/javascript" src="/home/js/jquery.js"></script>
<script type="text/javascript" src="/home/js/jqpublic.js"></script>
	<section class="Psection MT20" id="Cflow">
	    <!--如果用户未添加收货地址，则显示如下-->
	    <form action='/cart/zhifu' method="post">
	    <div class="confirm_addr_f">
	        <span class="flow_title">
	            收货地址：
	        </span>
	        <input type="text" name="address">	   
	         <span class="flow_title">
	            收货电话：
	        </span>
	        <input type="text" name="phone">	     	        
	    	<!--配送方式及支付，则显示如下-->
	   		<!--check order or add other information-->
	     	
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
	                @php
						$zong = 0;
	                @endphp
	                @foreach($res as $k => $v)
	                @php
						$zong += $v->price;
	                @endphp
	                <tr>
	                    <td>
	                        {{$v->fname}}
	                    </td>
	                    <td>
	                        {{$v->count}}
	                    </td>
	                    <td>
	                        ￥{{$v->danjia}}
	                    </td>
	                    <td>
	                        ￥{{$v->price}}
	                    </td>
	                </tr>
	                @endforeach
	            </table>
	            <div class="Order_M">
	                <p>
	                    <em>
	                        订单附言:
	                    </em>
	                    <input name="message" type="text">
	                </p>
	            </div>
	            <div class="Sum_infor">
	                <p class="p1">
	                    商品费用：￥{{$zong}}
	                </p>
	                <p class="p2">
	                    合计：
	                    <span>
	                        ￥{{$zong}}
	                    </span>
	                </p>
	                <input type="submit" value="提交订单" / class="p3button">
	                <input type="hidden" name="order" value='{{$order}}'>
	                <input type="hidden" name="jiage" value='{{$zong}}'>
	                <input type="hidden" name="shopid" value='{{$shopid}}'>
	                {{csrf_field()}}
	            </div>
	        </div>
	   	    </form>
	    </div>
    </section>


@stop
