@extends('layout.home')

@section('title','好吃喵')
@section('css')
    <link href="/home/style/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/home/js/public.js"></script>
    <script type="text/javascript" src="/home/js/jquery.js"></script>
    <script type="text/javascript" src="/home/js/jqpublic.js"></script>
    <!-- <script type="text/javascript" src="/home/js/cart.js"></script> -->
    <script type="text/javascript" src="/home/js/jquery.easyui.min.js"></script>
    <script type="text/javascript">
        
    

$(document).ready(function () {
    // 全选        
    $(".allselect").click(function () {
        $(".gwc_tb2 input[name=newslist]").each(function () {
            $(this).attr("checked", true);
        });
        GetCount();
    });

    //反选
    $("#invert").click(function () {
        $(".gwc_tb2 input[name=newslist]").each(function () {
            if ($(this).attr("checked")) {
                $(this).attr("checked", false);

            } else {
                $(this).attr("checked", true);

            } 
        });
        GetCount();
    });
    //取消
    $("#cancel").click(function () {
        $(".gwc_tb2 input[name=newslist]").each(function () {
            $(this).attr("checked", false);

        });
        GetCount();
    });

    // 所有复选(:checkbox)框点击事件
    $(".gwc_tb2 input[name=newslist]").click(function () {
        if ($(this).attr("checked")) {

        } else {

        }
    });

    // 输出
    $(".gwc_tb2 input[name=newslist]").click(function () {

        GetCount();
    });
});
//******************
function GetCount() {
    var conts = 0;
    var aa = 0;
    $(".gwc_tb2 input[name=newslist]").each(function () {
        if ($(this).attr("checked")) {
            for (var i = 0; i < $(this).length; i++) {
                conts += parseInt($(this).val());
                aa += 1;
            }
        }
    });
    $("#shuliang").text(aa);
    $("#zong1").html((conts).toFixed(2));
    $("#jz1").css("display", "none");
    $("#jz2").css("display", "block");
}
//ADD:对删除链接进行处理2014-9-20DeathGhost
    $(document).ready(function(){
        $("#delcart1").click(function(){
            $("#table1").remove();
            });
        $("#delcart2").click(function(){
            $("#table2").remove();
            });
        });

    $(function () {
        var t = $("#text_box2");
        $("#add2").click(function () {
            t.val(parseInt(t.val()) + 1)
            setTotal(); GetCount();
        })
        $("#min2").click(function () {
            t.val(parseInt(t.val(1)) - 1)
            t.val(1)//初始值防止为负数ADD deathghost
            setTotal(); GetCount();
        })
        function setTotal() {
            $("#total2").html((parseInt(t.val()) * 59).toFixed(2));
            $("#newslist-2").val(parseInt(t.val()) * 59);
        }
        setTotal();
    })
    $(function () {
        var t = $("#text_box1");
        $("#add1").click(function () {
            t.val(parseInt(t.val()) + 1)
            setTotal(); GetCount();
        })
        $("#min1").click(function () {
            t.val(parseInt(t.val()) - 1)
            t.val(1)//初始值防止为负数ADD deathghost
            setTotal(); GetCount();
        })
        function setTotal() {

            $("#total1").html((parseInt(t.val()) * 59).toFixed(2));
            $("#newslist-1").val(parseInt(t.val()) * 59);
        }
        setTotal();
    })

    $(function () {
        $(".quanxun").click(function () {
            setTotal();
            //alert($(lens[0]).text());
        });
        function setTotal() {
            var len = $(".tot");
            var num = 0;
            for (var i = 0; i < len.length; i++) {
                num = parseInt(num) + parseInt($(len[i]).text());

            }
            //alert(len.length);
            $("#zong1").text(parseInt(num).toFixed(2));
            $("#shuliang").text(len.length);
        }
        //setTotal();
    })
//add to cart shoppage
var data = {"total":0,"rows":[]};
        var totalCost = 0;
        
        $(function(){
            $('#cartcontent').datagrid({
                singleSelect:true
            });
            $('.item').draggable({
                revert:true,
                proxy:'clone',
                onStartDrag:function(){
                    $(this).draggable('options').cursor = 'not-allowed';
                    $(this).draggable('proxy').css('z-index',2);
                },
                onStopDrag:function(){
                    $(this).draggable('options').cursor='move';
                }
            });
                $('.cart').droppable({
                    onDragEnter:function(e,source){
                       
                        $(source).draggable('options').cursor='auto';
                    },
                    onDragLeave:function(e,source){
                        
                        $(source).draggable('options').cursor='not-allowed';
                    },
                    onDrop:function(e,source){
                       
                        var name = $(source).find('p:eq(0)').html();
                        var price = $(source).find('p:eq(1)').html();
                        
                        var cpid =  $(source).find('p:eq(0)').attr('cpid');
                        var cpjg = $(source).find('p:eq(1)').attr('price');
                        
                        $.post('/addgwc',{'shopid':{{$dpid}},'_token':'{{csrf_token()}}','cpid':cpid,'cpjg':cpjg,'cpname':name},function(data){
                            if(data == 1){
                                alert('请先清空别家店铺的购物车后再试！！');

                            }
                            location.reload();
                        });
                    }
                });
        });
        
       function addProduct(name,price){
            function add(){
                for(var i=0; i<data.total; i++){
                    var row = data.rows[i];
                    if (row.name == name){
                        row.quantity += 1;
                        return;
                    }
                }
                data.total += 1;
                data.rows.push({
                    name:name,
                    quantity:1,
                    price:price
                });
            }
            add();
            totalCost += price;
            $('#cartcontent').datagrid('loadData', data);
            var totle = $('div.cart .total').html();
            $('div.cart .total').html(parseInt(totle)+parseInt(totalCost));
        }



    </script>
    <script>
        $(function() {
            $('.title-list li').click(function() {
                var liindex = $('.title-list li').index(this);
                $(this).addClass('on').siblings().removeClass('on');
                $('.menutab-wrap div.menutab').eq(liindex).fadeIn(150).siblings('div.menutab').hide();
                var liWidth = $('.title-list li').width();
                $('.shopcontent .title-list p').stop(false, true).animate({
                    'left': liindex * liWidth + 'px'
                },
                300);
            });

            $('.menutab-wrap .menutab li').hover(function() {
                $(this).css("border-color", "#ff6600");
                $(this).find('p > a').css('color', '#ff6600');
            },
            function() {
                $(this).css("border-color", "#fafafa");
                $(this).find('p > a').css('color', '#666666');
            });
        });
        var mt = 0;
        window.onload = function() {
            var Topcart = document.getElementById("Topcart");
            var mt = Topcart.offsetTop;
            window.onscroll = function() {
               
                var t = document.documentElement.scrollTop || document.body.scrollTop;
                if (t > mt) {
                    Topcart.style.position = "fixed";
                    Topcart.style.margin = "";
                    Topcart.style.top = "200px";
                    Topcart.style.right = "191px";
                    Topcart.style.boxShadow = "0px 0px 20px 5px #cccccc";
                    Topcart.style.top = "0";
                    Topcart.style.border = "1px #636363 solid";
                } else {
                    Topcart.style.position = "static";
                    Topcart.style.boxShadow = "none";
                    Topcart.style.border = "";
                }
            }
        }
    </script>
    <style>
        .tag-na {
            border-bottom: 1px solid #e5e5e5;
            color: #333;
        }
        .Shop-index article .shopinfor .title {
            height: 45px;
            line-height: 45px;
            border-bottom: 1px #e7e5e6 solid;
            font-size: 20px;
            font-weight: 600;
        
            box-shadow: 5px 5px 5px #f1f1f1;
            background-image: -moz-linear-gradient(top, #fff, #f5f5f5);
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fff), color-stop(1, #f5f5f5));
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#c6ff00', endColorstr='#538300', GradientType='0');
        }
        .fslist_navtree {
            width: 415px;
            margin: 20px auto 0;
            border: 1px #dddddd solid;
            overflow: hidden;
        }
        .Logo_search .Search .Search_area .searchbox {
           
            height: 21px;
          
        }
    </style>
@stop
@section('content')
    <section class="Shop-index">
        <article>
            <div class="shopinfor">              
                <div class="title">                  
                    <span>
                        {{$shopusers->shopname}}
                    </span>                                      
                </div>
                <div class="imginfor">
                    <div class="shopimg">
                        <img src="{{$shopusers->logo}}" id="showimg">
                        <ul class="smallpic">
                            <li>
                               
                            </li>
                        </ul>
                    </div>
                    <div class="shoptext">
                        <p>
                            <span>
                                地址：
                            </span>
                           {{$shopusers->address}}
                        </p>
                        <p>
                            <span>
                               电话：
                            </span>
                            {{$shopusers->tel}}
                        </p>                                                                                              
                        <div class="otherinfor">
                            <section class="fslist_navtree">
                             <ul class="select">
                                <li class="select-list">
                                    <dl id="select1">
                                        <dt>菜品分类:</dt>    
                                        @foreach($goodtypes as $k => $v)                                  
                                        <dd><a href="#{{$v->id}}">{{$v->lbname}}</a></dd>
                                        @endforeach   
                                    </dl>
                                </li>
                            </ul>
                            </section>
                                                   
                        </div>

                        <div class="otherinfor">
                            <a href="#" class="icoa">
                                <img src="/collect.png">
                                收藏店铺
                            </a>                                                                               
                        </div>
                         <div class="otherinfor">
                            <a href="#" class="icoa">
                                <img width="20" src="/fx.png">
                                分享
                            </a>                                                                               
                        </div>
                    </div>
                </div>
                
                <div class="shopcontent">
                    <div class="title2 cf">
                        <ul class="title-list fr cf ">
                            <li class="on">
                                菜谱
                            </li>
                            <li>
                                累计评论（5）
                            </li>
                            <li>
                                商家详情
                            </li>
                            <li>
                                店铺留言
                            </li>
                            <p>
                                <b>
                                </b>
                            </p>
                        </ul>
                    </div>
                    <div class="menutab-wrap">
                        <a name="ydwm">
                            <!--case1-->
                           
                            <div class="menutab show">
                                @foreach($goodtypes as $k => $v)  

                                <h3 class="title title-0" title="{{$v->lbname}}" id="{{$v->id}}">
                                    <span class="tag-na">{{$v->lbname}}</span>
                                </h3>
                                <ul class="products">
                                 @foreach($goods as $key => $val)
                                 @if($val->gtid == $v->id)
                                    <li>
                                        <a href="javascript:void(0)" target="_blank" title="{{$val->cpname}}">
                                            <img src="{{$val->cppic}}" class="foodsimgsize">
                                        </a>
                                        <a href="#" class="item">
                                            <div>
                                                <p cpid='{{$val->id}}'>
                                                    {{$val->cpname}}
                                                </p>
                                                <p class="AButton" price='{{$val->price}}'>
                                                    拖至购物车:￥{{$val->price}}
                                                </p>
                                            </div>
                                        </a>
                                    </li>                                                               @endif
                                @endforeach 
                                                                           
                                </ul>
                                @endforeach 
                            </div>
                            
                        </a>
                        <!--case2-->
                        <div class="menutab">
                            <div class="shopcomment">
                                <div class="Spname">
                                    <a href="#" target="_blank" title="酸辣土豆丝">
                                        酸辣土豆丝
                                    </a>
                                </div>
                                <div class="C-content">
                                    <q>
                                        还不错，速度挺快,还不错，速度挺快还不错，速度挺快还不错，速度挺快还不错，速度挺快还不错，速度挺快还不错，速度挺快。。。
                                    </q>
                                    <i>
                                        2014年09月17日 19:36
                                    </i>
                                </div>
                                <div class="username">
                                    DeatGhost
                                </div>
                            </div>
                        </div>
                        <!--case4-->
                        <div class="menutab">
                            <div class="shopdetails">
                                <div class="shopmaparea">
                                    <img src="upload/testimg.jpg">
                                    <!--此处占位图调用动态地图后将其删除即可-->
                                </div>
                                <div class="shopdetailsT">
                                    <p>
                                        <span>
                                            店铺：外婆家
                                        </span>
                                    </p>
                                    <p>
                                        <span>
                                            地址：
                                        </span>
                                        陕西省西安市雁塔区丈八北路***号
                                    </p>
                                    <p>
                                        <span>
                                            电话：
                                        </span>
                                        029-88888888
                                    </p>
                                    <p>
                                        <span>
                                            乘车路线：
                                        </span>
                                        300路、115路、14路、800路到西辛庄站下车往东100米
                                    </p>
                                    <p>
                                        <span>
                                            店铺介绍：
                                        </span>
                                        ***于2005年3月28日开业，立于西安市碑林区***于2005年3月28日开业，立于西安市碑林区***于2005年3月28日开业，立于西安市碑林区***于2005年3月28日开业，立于西安市碑林区***
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--case5-->
                        <div class="menutab">
                            <span class="Ask">
                                <i>
                                    DeathGhost
                                </i>
                                :这里是测试问答？
                            </span>
                            <span class="Answer">
                                <i>
                                    管理员回复
                                </i>
                                ：这里是测试回答！
                            </span>
                            <div class="TurnPage">
                                <a href="#">
                                    <span class="Prev">
                                        <i>
                                        </i>
                                        首页
                                    </span>
                                </a>
                                <a href="#">
                                    <span class="PNumber">
                                        1
                                    </span>
                                </a>
                                <a href="#">
                                    <span class="PNumber">
                                        2
                                    </span>
                                </a>
                                <a href="#">
                                    <span class="Next">
                                        最后一页
                                        <i>
                                        </i>
                                    </span>
                                </a>
                            </div>
                            <form class="A-Message" action="#">
                                <p>
                                    <i>
                                        姓名：
                                    </i>
                                    <input name="usr_name" type="text" autofocus placeholder="张三" required>
                                </p>
                                <p>
                                    <i>
                                        手机：
                                    </i>
                                    <input name="" type="text" placeholder="15825518***" pattern="[0-9]{11}"
                                    required>
                                </p>
                                <p>
                                    <i>
                                        邮件：
                                    </i>
                                    <input type="email" name="email" autocomplete="off" placeholder="admin@admin.com"
                                    required/>
                                </p>
                                <p>
                                    <i>
                                        问题补充：
                                    </i>
                                    <textarea name="" cols="" rows="" required placeholder="详细说明您的问题...">
                                    </textarea>
                                </p>
                                <p>
                                    <input type="submit" class="Abutt" />
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
        </article>
        <aside>
            <div class="cart" id="Topcart">
                <span class="Ctitle Block FontW Font14">
                    <a href="" target="_blank">
                        我的购物车
                    </a>
                </span>
                <table id="cartcontent" fitColumns="true">
                    <thead>
                        <tr>
                            <th width="33%" align="center" field="name">
                                商品
                            </th>
                            <th width="33%" align="center" field="quantity">
                                数量
                            </th>
                            <th width="33%" align="center" field="price">
                                价格
                            </th>
                        </tr>
                        @php
                            $totle = 0;
                        @endphp
                        @foreach($cart as $k => $v)
                        @php
                            $totle += $v->price;
                        @endphp
                        <tr>
                            <th width="33%" align="center" field="name">
                                {{$v->fname}}
                            </th>
                            <th width="33%" align="center" field="quantity">
                                {{$v->count}}
                            </th>
                            <th width="33%" align="center" field="price">
                                {{$v->price}}
                            </th>
                        </tr>
                        
                        @endforeach


                    </thead>
                    
                        
                    
                      

                        
                </table>
                <p class="Ptc">
                    <span class="Cbutton">
                        <a href="/cart/jiesuan/{{$dpid}}" target="进入购物车">
                            进入购物车
                        </a>
                    </span>
                    <span class="total">
                        总金额：￥{{$totle}}
                    </span>
                </p>
            </div>
            
           
        </aside>
    </section>
    <!--End content-->



@stop
