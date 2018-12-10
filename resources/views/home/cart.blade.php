@extends('layout.home')

@section('title','好吃喵')

@section('content')

<link href="css/index.css" rel="stylesheet" type="/home/cart/text/css" />
<script type="text/javascript" src="/home/cart/js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="/home/cart/js/Calculation.js"></script>
<div class="gwc" style=" margin:auto;">
	<table cellpadding="0" cellspacing="0" class="gwc_tb1">
		<tr>	
			<td class="tb1_td3">商品</td>
			<td class="tb1_td4">商品单价</td>
			<td class="tb1_td5">数量</td>
			<td class="tb1_td6">总价</td>
			<td class="tb1_td7">操作</td>
		</tr>
	</table>
	@php 
	$zong = 0;
	@endphp
	@foreach($total as $k => $v)
	@php
	$zong += $v->price;
	@endphp
	<table cellpadding="0" cellspacing="0" class="gwc_tb2">
		<tbody><tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class="tb2_td2"><a href="#"><img src="@foreach($goods as $vv) @if($vv->id == $v -> fid) {{$vv->cppic}} @endif @endforeach"></a></td>
			<td class="tb2_td3"><a href="#">{{$v->fname}}</a></td>
			<td class="tb1_td4">{{$v->danjia}}</td>
			<td class="tb1_td5">
				<input id="min" cartid='{{$v->id}}' name="" style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="-" onclick="min1(this)">
				<input id="text_box1" name="" type="text" value="{{$v->count}}" style=" width:30px; text-align:center; border:1px solid #ccc;">
				<input cartid='{{$v->id}}' id="add" name="" style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="+" onclick="add1(this)">
			</td>
			<td class="tb1_td6"><label id="total1" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;">{{$v->price}}</label></td>
			<td class="tb1_td7"><a href="#">删除</a></td>
		</tr>
	</tbody></table>
	@endforeach
	<table cellpadding="0" cellspacing="0" class="gwc_tb3">
		<tr>
			<td class="tb3_td3">合计:<span style="color: red">￥{{$zong}}</span><span style=" color:#ff5500;"><label id="zong" style="color:#ff5500;font-size:14px; font-weight:bold;"> </label></span></td>
			<td class="tb3_td4"><a href="/cart/jiesuan"><span style="color: red" id="jz1">结算</span></a></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	function add1(obj){
		var carid = obj.getAttribute('cartid');
		$.get('/cart/add',{'cartid':carid},function(){
			location.reload();
		});
	}

	function min1(obj){
		var carid = obj.getAttribute('cartid');
		var count = obj.nextElementSibling.value;
		if(count > 1){
			$.get('/cart/min',{'cartid':carid},function(){
				location.reload();
			});
		}	
	}

</script>
@stop