@extends('layout.home')

@section('title','好吃喵')
<style> 
    .classtitle {        
    height: 30px;
    line-height: 50px;
    text-indent: 2em;
}
</style>

@section('content')

<section class="Psection">
    <section class="fslist_navtree">
        <ul class="select">
    		<li class="select-list">
    			<dl id="select1">
    				<dt>分类：</dt>
    				<dd class="select-all selected"><a href="javascript:">全部</a></dd>
                    @foreach($goodtypes as $k => $v)
    				<dd><a href="javascript:">{{$v->lbname}}</a></dd>  
                    @endforeach
    			</dl>
    		</li>		
    	</ul>
    </section>
    @foreach($goodtypes as $k => $v)
    <section class="CateL Overflow">       
         <div class="shopcontent">
            <div class="title2 cf">
                {{$v->lbname}}
            </div>
          
            <div class="menutab-wrap">
                <a name="ydwm">           
                    <div class="menutab show">
                        @foreach($goods as $key => $val)
                        @if($val->gtid == $v->id)
                        <ul class="products">
                            <li>
                                <a href="" title="{{$val->cpname}}">
                                    <img src="{{$val->cppic}}" class="foodsimgsize">
                                </a>
                                <a href="#" class="item">
                                    <div>
                                        <p>
                                            {{$val->cpname}}
                                        </p>
                                        <p class="AButton">
                                            拖至购物车:￥{{$val->price}}
                                        </p>
                                    </div>
                                </a>
                            </li>                                                       
                        </ul>
                        @endif
                        @endforeach 
                    </div>
                </a>
            </div>
            
        </div>
    </section>
    @endforeach
    <aside class="CateR">             
        <div class="Hot_shop">
            <span class="Hshoptile Font14 FontW Block">热门商家</span>
            <ul>   
                <li>
                    <a href="shop.html" target="_blank" title="好味来快餐连锁店"><img src="upload/ee.jpg"></a>
                    <p class="Font14 FontW Overflow Lineheight35"><a href="shop.html" target="_blank" title="好味来快餐连锁店">好味来快餐连锁店</a></p>
                    <p class="Lineheight35 Overflow"><span title="通过动态控制地址的字符数量...">地址：西安市莲湖区土门新市场斜对面...</span></p>
                </li>    
            </ul>
        </div>
    </aside>
</section>








@stop