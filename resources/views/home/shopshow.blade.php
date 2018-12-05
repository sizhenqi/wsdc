@extends('layout.home')

@section('title','好吃喵')
<style> 
    .classtitle {
    
    width:500px;
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
    <section class="CateL Overflow">
        <div class="Font16 FontW classtitle"> 

        </div>
        <ul>
            <li> 
                <a href="detailsp.html" target="_blank" title="酸辣土豆丝">
                    <img src="upload/05.jpg">
                    <p class="Overflow">酸辣土豆丝</p>
                    <p class="Overflow">赠送：<span class="CorRed Font16">2</span>积分<i></i></p>
                    <p class="Overflow">好味来快餐连锁店</p>
                    <p class="Overflow">地址：莲湖区土门十字往西100米</p>
                </a>
            </li>      
        </ul>
        <div class="TurnPage">
            <a href="#">
                <span class="Prev"><i></i>首页</span>
            </a>
            <a href="#"><span class="PNumber">1</span></a>
            <a href="#"><span class="PNumber">2</span></a>
            <a href="#">
            <span class="Next">最后一页<i></i></span>
        </a>
        </div>
    </section>
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