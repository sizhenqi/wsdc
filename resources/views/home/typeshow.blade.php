@extends('layout.home')

@section('title','好吃喵')

@section('content')





<section class="Psection MT20">
 <article class="Searchlist Overflow" style="width: auto">
  <ul class="Overflow">
  	@foreach($res as $k=>$v)
	
 @php
          $l = explode('|',$v->wzzb)[0];
          $r = explode('|',$v->wzzb)[1];
          $distance = distanceBetween($l,$r,session('dqwz')['dqwzlng'],session('dqwz')['dqwzlat']);
        @endphp
        @if($v->shstatus == 2)

        @if($distance <= $v-> psjl)

    <li>
    <a href=@if($v->status == 1) "/shop/show/{{$v->id}}" @else "javascript:void(0)" @endif target="_blank"><img src=@if($v->status == 1) "{{$v->logo}}" @else "/close.png" @endif></a>
    <p class="P-shop Overflow"><span class="sa"><a href="shop.html" target="_blank" title="好味来快餐店">{{$v->shopname}}</a></span><span class="sp"></span></p>
    <p class="P-shop Overflow">{{$v->address}}</p>
    </li>
	



   @endif
   @endif
	@endforeach


  </ul>

 </article>

</section>


@stop