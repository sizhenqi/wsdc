@extends('layout.home')

@section('title','好吃喵')

@section('content')

<section class="Psection MT20">
 <form action="/shopuser/zhuce/do" enctype="multipart/form-data" method="post">
  <table class="Register">
  <tbody><tr>
  <td width="40%" align="right" class="FontW">门店名称：</td>
  <td><input type="text" name="shopname" required="" autofocus=""></td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">门店分类：</td>
  <td><select name='stid'>
  	@foreach($type as $k=>$v)
		<option value="{{$v->id}}">{{$v->type}}</option>	
	@endforeach
  	</select>
</td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">登录账号：</td>
  <td><input type="text" name="name" required="" autofocus=""></td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">登录密码：</td>
  <td><input type="password" name="pass" required=""></td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">重复密码：</td>
  <td><input type="password" name="repass" required=""></td>
  </tr>

  <tr>
  <td width="40%" align="right" class="FontW">联系电话：</td>
  <td><input type="text" name="tel" required="" pattern="[0-9]{11}"></td>
  </tr>
<tr>
  <td width="40%" align="right" class="FontW">详细地址：</td>
  <td><input type="text" name="xxdz"></td>
  </tr>
 <tr>
  <td width="40%" align="right" class="FontW">店铺logo：</td>
  <td><input style="border: 0px " type="file" name="logo" required="" ></td>
  </tr>







	
	  <tr>
  <td width="40%" align="right" class="FontW">店铺地址：</td>
  <td><input id='dz' style="border: 0px " type="text" name="adress" readonly=""></td>
  </tr>

  <tr>
  <td width="40%" align="right"></td>{{csrf_field()}}
  <td><input type="submit" name="" class="Submit_b" value="注 册"></td>
  </tr>
  </tbody></table>
 </form>
</section>

<section class="Cfn">
	
<style type="text/css">   
        #container{
        	height:100%;
			width:1200px;
			overflow: visible !important;
        } 

</style>





<div style="width: 800px;height:500px;">

	<div id="container" style=""></div>

</div>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=uFEAMF5bipjyyf3GGSVfEXmB3h82F9Xo"></script>

    <script type="text/javascript">
    	var dqwzlng = null;
    	var dqwzlat = null;

		var map = new BMap.Map("container");          // 创建地图实例  

			//根据当前位置定位
			var geolocation = new BMap.Geolocation();
			geolocation.getCurrentPosition(function(r){
				if(this.getStatus() == BMAP_STATUS_SUCCESS){
					var mk = new BMap.Marker(r.point);
					map.addOverlay(mk);
					map.panTo(r.point);
					var pt = r.point;
				}
				else {
					alert('failed'+this.getStatus());
				}        
			},{enableHighAccuracy: true})
			
		var new_point = new BMap.Point(dqwzlng,dqwzlat);
			var marker = new BMap.Marker(new_point);  // 创建标注
			map.addOverlay(marker);              // 将标注添加到地图中
			map.panTo(new_point); 


    	var point = new BMap.Point(dqwzlng, dqwzlat);  // 创建点坐标 

		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		
		map.centerAndZoom(point,15);      // 初始化地图,用城市名设置地图中心点

		//具体位置解析
		var geoc = new BMap.Geocoder();    
		//设置读取cookie
		
		//点击之后的事件
		function showInfo(e){
			dqwzlng = e.point.lng;
			dqwzlat = e.point.lat;

			dz.value=dqwzlng+'|'+dqwzlat;
			
		}
		//监听点击
		map.addEventListener("click", showInfo);

		map.enableInertialDragging();

		map.enableContinuousZoom();

		var size = new BMap.Size(10, 20);
		map.addControl(new BMap.CityListControl({
		    anchor: BMAP_ANCHOR_TOP_LEFT,
		    offset: size,
		}));

    </script>

</section>
@stop