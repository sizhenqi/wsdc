
@extends('layout.home')

@section('title','好吃喵')

@section('content')
<section class="Cfn">
	
<style type="text/css">   
        #container{
        	height:100%;
			width:1200px;
			overflow: visible !important;
        } 

</style>





<div style="width: 1200px;height:500px;">

	<div id="container" style=""></div>

</div>
</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=uFEAMF5bipjyyf3GGSVfEXmB3h82F9Xo"></script>

    <script type="text/javascript">
    	var dqwzlng = null;
    	var dqwzlat = null;

		var map = new BMap.Map("container");          // 创建地图实例  
		


    	 @if(!session('dqwz'))

			//根据当前位置定位
			var geolocation = new BMap.Geolocation();
			geolocation.getCurrentPosition(function(r){
				if(this.getStatus() == BMAP_STATUS_SUCCESS){
					var mk = new BMap.Marker(r.point);
					map.addOverlay(mk);
					map.panTo(r.point);
					dqwzlng = r.point.lng;
					dqwzlat = r.point.lat;
					var pt = r.point;
					geoc.getLocation(pt, function(rs){
						var addComp = rs.addressComponents;
						var dqwz = addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber;
						$.get('/home/setlocation',{'dqwz':dqwz,'dqwzlng':dqwzlng,'dqwzlat':dqwzlat},function(data){
							dqwza.innerHTML = data.dqwz;
							alert('已确定当前位置');
							window.location.reload();
						});

			}); 
				}
				else {
					alert('failed'+this.getStatus());
				}        
			},{enableHighAccuracy: true})
			//关于状态码
			//BMAP_STATUS_SUCCESS	检索成功。对应数值“0”。
			//BMAP_STATUS_CITY_LIST	城市列表。对应数值“1”。
			//BMAP_STATUS_UNKNOWN_LOCATION	位置结果未知。对应数值“2”。
			//BMAP_STATUS_UNKNOWN_ROUTE	导航结果未知。对应数值“3”。
			//BMAP_STATUS_INVALID_KEY	非法密钥。对应数值“4”。
			//BMAP_STATUS_INVALID_REQUEST	非法请求。对应数值“5”。
			//BMAP_STATUS_PERMISSION_DENIED	没有权限。对应数值“6”。(自 1.1 新增)
			//BMAP_STATUS_SERVICE_UNAVAILABLE	服务不可用。对应数值“7”。(自 1.1 新增)
			//BMAP_STATUS_TIMEOUT	超时。对应数值“8”。(自 1.1 新增)
    	 @else
    	 	dqwzlng = {{session('dqwz')['dqwzlng']}};
			dqwzlat = {{session('dqwz')['dqwzlat']}};
    	 @endif
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
			var pt = e.point;
			geoc.getLocation(pt, function(rs){
				var addComp = rs.addressComponents;
				var dqwz = addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber;
				$.get('/home/setlocation',{'dqwz':dqwz,'dqwzlng':dqwzlng,'dqwzlat':dqwzlat},function(data){
					dqwza.innerHTML = data.dqwz;
					alert('当前位置修改成功');
					window.location.reload();
				});

			}); 
			
		}
		//监听点击
		map.addEventListener("click", showInfo);

		map.enableInertialDragging();

		map.enableContinuousZoom();

		var size = new BMap.Size(10, 20);
		map.addControl(new BMap.CityListControl({
		    anchor: BMAP_ANCHOR_TOP_LEFT,
		    offset: size,
		    // 切换城市之间事件
		    // onChangeBefore: function(){
		    //    alert('before');
		    // },
		    // 切换城市之后事件
		    // onChangeAfter:function(){
		    //   alert('after');
		    // }
		}));

    </script>

</section>
 @stop