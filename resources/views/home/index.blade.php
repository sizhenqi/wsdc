@extends('layout.home')

@section('title','好吃喵')

@section('content')
<style>
  #UpRoll li{
    display:block;
    height:172px;
  }
  #UpRoll li p{
    text-align:center;
  }
</style>
<!--Start content-->
<section class="Cfn">
 <aside class="C-left">
  <div class="S-time">服务时间：Open 24 hours</div>
  <div class="C-time">
   <img src="/home/upload/dc.jpg"/>
  </div>
  <img src="/home/images/by_button.png">
 <img src="/home/images/dc_button.png">
 </aside>
 <div class="F-middle">
 <ul class="rslides f426x240">
        <li><a href="javascript:"><img src="/home/upload/01.jpg"/></a></li>
        <li><a href="javascript:"><img src="/home/upload/02.jpg" /></a></li>
        <li><a href="javascript:"><img src="/home/upload/03.jpg"/></a></li>
    </ul>
 </div>
 <aside class="N-right">
  <div class="N-title">本周推荐<i> Recommended this week</i></div>
  <ul class="Orderlist" id="UpRoll">
   <li>
     <p><img src="/shoppic/laobeijing.jpg" width=""></p>
     <p>收件人：1</p>
     <p>订单状态：<i class="State01">已发货</i></p>
   </li>


   <li>
     <p><img src="/shoppic/taishanghuang.jpg" width=""></p>
     <p>收件人：2</p>
     <p>订单状态：<i class="State02">已签收</i><i class="State03">已点评</i></p>
   </li>


   <li>
     <p><img src="/shoppic/laobeijing.jpg" width=""></p>
     <p>收件人：3</p>
     <p>订单状态：<i class="State02">已签收</i><i class="State03">已点评</i></p>
   </li>
  
   <li>
     <p><img src="/shoppic/taishanghuang.jpg" width=""></p>
     <p>收件人：4</p>
     <p>订单状态：<i class="State02">已签收</i><i class="State03">已点评</i></p>
   </li>
   
  </ul>
  <script>
   var UpRoll = document.getElementById('UpRoll');
   var lis = UpRoll.getElementsByTagName('li');
   var ml = 0;
   var timer1 = setInterval(function(){
    var liHeight = lis[0].offsetHeight;
    var timer2 = setInterval(function(){
     UpRoll.scrollTop = (++ml);
     if(ml ==1){
        clearInterval(timer2);
        UpRoll.scrollTop = 0;
        ml = 0;
        lis[0].parentNode.appendChild(lis[0]);
    }
    },10);
    },5000);
  </script>
 </aside>
</section>
<section class="Sfainfor">

 <article class="Sflist">
  <div id="Indexouter" style="width: 1200px;">
   <ul id="Indextab">
    <li>餐馆</li>
   </ul>
  <div id="Indexcontent">




   <ul style="display:block;">
    <li>
    <p class="seekarea" style="float: right;border: 0px">
    @foreach($shoptype as $k => $v)
    <a href="#">{{$v->type}}</a>
    @endforeach
    
     </p>
     <div class="DCcontent">
      @foreach($shopusers as $k => $v)
        @php
          $l = explode('|',$v->wzzb)[0];
          $r = explode('|',$v->wzzb)[1];
          $distance = distanceBetween($l,$r,session('dqwz')['dqwzlng'],session('dqwz')['dqwzlat']);
        @endphp
        @if($distance <= $v-> psjl)
       <a href="/shop/show/{{$v->id}}" target="_blank" title="{{$v->shopname}}">
       <figure>
       <img src="{{$v->logo}}">
       <figcaption>
       <span class="title">{{$v->shopname}}</span>
       <span class="price">预定折扣：<i>8.9折</i></span>
       </figcaption>
       <p class="p1">店铺订餐电话：{{$v->tel}}</p>
       <p class="p3">据我距离：{{$distance}}米</p>
       <p class="p3">店铺地址：{{$v->address}}</p>
       </figure>
      </a>
        @endif
      @endforeach
     </div>

  </li>
   </ul>
</div>
 </div>
 </article>




</section>
<!--End content-->
  <div class="F-link" style="height: auto">
      <span>友情链接：</span>
      @foreach($frilinks as $k => $v)
      <img src="{{$v->pic}}" width="100" height="50"><a style="margin-right:100px" href="{{$v -> url}}" target="_blank" title="{{$v->descript}}">{{$v->title}}</a>
      @endforeach

  </div>
@stop