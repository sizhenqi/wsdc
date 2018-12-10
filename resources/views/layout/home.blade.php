<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
      
        <link rel="icon" href="/home/images/logo.png" type="image/x-icon"/>
       @section('css') 
        <link href="/home/style/style.css" rel="stylesheet" type="text/css" />      
        <link rel="stylesheet" type="text/css" href="/home/style/manhuaDialog.1.0.css">
        <script type="text/javascript" src="/home/js/public.js"></script>
        <script type="text/javascript" src="/home/js/jquery.js"></script>
		<script type="text/javascript" src="/home/js/manhuaDialog.1.0.js"></script>
        <script type="text/javascript" src="/home/js/jqpublic.js"></script>

       
    <link rel="stylesheet" type="text/css" href="/home/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/home/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="/home/css/util.css">
    <link rel="stylesheet" type="text/css" href="/home/css/main.css">

<style type="text/css">

    .Cfn .F-middle .rslides_tabs{
        z-index:5;
    }
    .content{
        z-index:9;
    }
    .floatBox{
        border-radius:10px;
        border: none;
    }
    .wrap-login100{
        border-radius: 10px;
    }
    .floatBox .title{
        height: 35px;
        background-color:white;
    }
    #忘记密码{
        z-index:9990;
    }
    
</style>
@show
      <script type="text/javascript">
        $(function (){
            $("#denglus").manhuaDialog({
                Event : "click",                                //触发响应事件
                title : "用户登录",                             //弹出层的标题
                type : "id",                                    //弹出层类型(text、容器ID、URL、Iframe)
                content : "denglu",                             //弹出层的内容获取(text文本、容器ID名称、URL地址、Iframe的地址)
                width :500,                                    //弹出层的宽度
                height :700,                                   //弹出层的高度
                scrollTop : 200,                                //层滑动的高度也就是弹出层时离顶部滑动的距离
                isAuto : false,                                 //是否自动弹出
                time : 2000,                                    //设置弹出层时间，前提是isAuto=true
                isClose : false,                                //是否自动关闭
                timeOut : 5000                             //设置自动关闭时间，前提是isClose=true
            });
        });

        $(function (){
            $("#zhuces").manhuaDialog({
                Event : "click",                                //触发响应事件
                title : "用户注册",                             //弹出层的标题
                type : "id",                                    //弹出层类型(text、容器ID、URL、Iframe)
                content : "zhuce",                             //弹出层的内容获取(text文本、容器ID名称、URL地址、Iframe的地址)
                width : 500,                                    //弹出层的宽度
                height :700,                                   //弹出层的高度
                scrollTop : 200,                                //层滑动的高度也就是弹出层时离顶部滑动的距离
                isAuto : false,                                 //是否自动弹出
                time : 2000,                                    //设置弹出层时间，前提是isAuto=true
                isClose : false,                                //是否自动关闭
                timeOut : 5000                             //设置自动关闭时间，前提是isClose=true
            });
        });
        $(function (){
            $("#wangjis").manhuaDialog({
                Event : "click",                                //触发响应事件
                title : "忘记密码",                             //弹出层的标题
                type : "id",                                    //弹出层类型(text、容器ID、URL、Iframe)
                content : "wangji",                             //弹出层的内容获取(text文本、容器ID名称、URL地址、Iframe的地址)
                width :500,                                    //弹出层的宽度
                height :700,                                   //弹出层的高度
                scrollTop : 200,
                                               //层滑动的高度也就是弹出层时离顶部滑动的距离动的距离
                isAuto : false,                               //是否自动弹出
                time : 2000,                                    //设置弹出层时间，前提是isAuto=true
                isClose : false,                                //是否自动关闭
                timeOut : 5000                             //设置自动关闭时间，前提是isClose=true
            });
        });
</script>

    </head>
    @if(session('info'))
        <script type="text/javascript">
            alert('{{session('info')}}');
        </script>
    @endif
<div id="denglu" style="display:none;z-index:9999">
             <script type="text/javascript">
                        function dlajax(obj){
                            $.post('/user/login',{
                                'username':$(obj).parent().parent().parent().children().eq(1).children().eq(1).val(),
                                'pass':$(obj).parent().parent().parent().children().eq(2).children().eq(1).val(),
                                '_token':'{{csrf_token()}}'
                            },function(data){
                                    if(data == '1'){
                                        alert('登陆成功，祝您用餐愉快');
                                         window.location.href = '/';
                                    }else{
                                        alert(data);
                                    }
                            });
                        }
                         
                    </script>             


  <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54"> 
                  
                    <span class="login100-form-title p-b-49">登录</span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="请输入用户名">
                        <span class="label-input100">用户名</span>
                        <input class="input100" type="text" name="username" placeholder="请输入用户名" autocomplete="off">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="请输入密码">
                        <span class="label-input100">密码</span>
                        <input class="input100" type="password" name="pass" placeholder="请输入密码">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a id='wangjis' href="javascript:void(0);" >忘记密码</a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" onclick='dlajax(this)'>登 录</button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>第三方登录</span>
                    </div>

                    <div class="flex-c-m">
                        <a href="/oauth/qq" class="login100-social-item bg2">
                            <i class="fa fa-qq"></i>
                        </a>
                    </div>
            </div>
</div>
<div id="zhuce" style="display:none;z-index:9999">
    <script type="text/javascript">
        function fsyzm(obj){
            var num = $('#djfs').prev().attr('value');
            if(num == ''){
                alert('请输入手机号');
                return 0;
            }
            $.post('/zhuceapi',{'_token':'{{csrf_token()}}',"number":num},function(data){});
            obj.style.backgroundColor = '#eee';
            obj.setAttribute("disabled",true);
            var time = 60;
            var set = setInterval(function(){
                time--;
                obj.value = '重新发送('+ time +')';
            },1000);
            setTimeout(function(){
                obj.removeAttribute('disabled');
                clearInterval(set);
                obj.style.backgroundColor = 'cyan';
                obj.value = '发送验证码';
            },60000);

        }
        function zcajax(obj){
            $.post('/user/zhuce',{
                'username':$(obj).parent().parent().parent().children().eq(1).children().eq(1).val(),
                'telnumber':$(obj).parent().parent().parent().children().eq(4).children().eq(1).val(),
                'pass':$(obj).parent().parent().parent().children().eq(2).children().eq(1).val(),
                'repass':$(obj).parent().parent().parent().children().eq(3).children().eq(1).val(),
                'yzm':$(obj).parent().parent().parent().children().eq(5).children().eq(1).val(),
                '_token':'{{csrf_token()}}'
            },function(data){
                if(data == '1'){
                    alert('注册成功');
                    window.location.href = '/';
                }else{
                  alert(data);
                }
               
            });
        }
    </script>
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <span class="login100-form-title p-b-49">注册</span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="请输入用户名">
                        <span class="label-input100">用户名</span>
                        <input class="input100" type="text" name="username" placeholder="请输入用户名" autocomplete="off">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="请输入密码">
                        <span class="label-input100">密码</span>
                        <input class="input100" type="password" name="pass" placeholder="请输入密码">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="请输入密码">
                        <span class="label-input100">重复密码</span>
                        <input class="input100" type="password" name="repass" placeholder="请再次输入密码">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>

                   <div class="wrap-input100 validate-input m-b-23" data-validate="请输入手机号">
                        <span class="label-input100" style="display: block;">手机号</span>
                        <input class="input100" type="text" size="255"  style="display:inline;width:50%;" name="telnumber" placeholder="请输入手机号" autocomplete="off">
                        
                       <input type="button" id='djfs' style="border-radius:20px ;display: inline !important;background-color: cyan;width: 40%"  class="login100-form-btn"  onclick="fsyzm(this)" value='发送验证码'>
                        <span class="focus-input100" data-symbol=""></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="请输入验证码">
                        <span class="label-input100">验证码</span>
                        <input class="input100" type="text" name="yzm" placeholder="请输入验证码" autocomplete="off">
                        <span class="focus-input100"></span>
                    </div>


                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" onclick="zcajax(this)">注册</button>
                        </div>
                    </div>
           
            </div>
</div>

<div id="wangji" style="display:none;z-index:9999">
     <script type="text/javascript">
                function zhajax(obj){
                    $.post('/user/zhaohui',{
                        'username':$(obj).parent().parent().parent().children().eq(1).children().eq(1).val(),
                        'telnumber':$(obj).parent().parent().parent().children().eq(4).children().eq(1).val(),
                        'pass':$(obj).parent().parent().parent().children().eq(2).children().eq(1).val(),
                        'repass':$(obj).parent().parent().parent().children().eq(3).children().eq(1).val(),
                        'yzm':$(obj).parent().parent().parent().children().eq(5).children().eq(1).val(),
                        '_token':'{{csrf_token()}}'
                    },function(data){
                        if(data == '1'){
                            alert('密码找回成功');
                            window.location.href = '/';
                        }else{
                          alert(data);
                        }

                       
                    });
                }
            function zhyzm(obj){
                        var num = $('#djfszh').prev().attr('value');
                        if(num == ''){
                            alert('请输入手机号');
                            return 0;
                        }
                        $.post('/zhaohuiapi',{'_token':'{{csrf_token()}}',"number":num},function(data){});
                        obj.style.backgroundColor = '#eee';
                        obj.setAttribute("disabled",true);
                        var time = 60;
                        var seta = setInterval(function(){
                            time--;
                            obj.innerHTML = '重新发送('+ time +')';
                        },1000);
                        setTimeout(function(){
                            obj.removeAttribute('disabled');
                            clearInterval(seta);
                            obj.style.backgroundColor = 'cyan';
                            obj.innerHTML = '发送验证码';
                        },60000);

                    }
            </script>
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                
                    <span class="login100-form-title p-b-49">找回密码</span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="请输入用户名">
                        <span class="label-input100">用户名</span>
                        <input class="input100" type="text" name="username" placeholder="请输入用户名" autocomplete="off">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="请输入密码">
                        <span class="label-input100">新密码</span>
                        <input class="input100" type="password" name="pass" placeholder="请输入密码">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="确认密码">
                        <span class="label-input100">确认新密码</span>
                        <input class="input100" type="password" name="repass" placeholder="确认新密码">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>
                   <div class="wrap-input100 validate-input m-b-23" data-validate="请输入手机号">
                        <span class="label-input100" style="display: block;">手机号</span>
                        <input class="input100" type="text"  style="display:inline;width:55%;" name="telnumber" placeholder="请输入手机号" autocomplete="off">
                        
                       <button id='djfszh' style="border-radius:20px ;display: inline !important;background-color: cyan;width: 40%"  class="login100-form-btn"  onclick="zhyzm(this)">发送验证码</button>
                        <span class="focus-input100" data-symbol=""></span>

                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="请输入验证码">
                        <span class="label-input100">验证码</span>
                        <input class="input100" type="text" name="yzm" placeholder="请输入验证码" autocomplete="off">
                        <span class="focus-input100"></span>
                    </div>


                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" onclick="zhajax(this)">找回</button>
                        </div>
                    </div>

            </div>
</div>



    <body>
        <header>
            <section class="Topmenubg">
                @if(!session('uinfo'))
                <div class="Topnav">
                    
                    <div class="LeftNav">
                        <a id='zhuces' class='djzc' href="javascript:void(0)">注册</a>
                        <a id='denglus' href="javascript:void(0)">登录</a></div>
                       
                    <div class="RightNav">
                        <a href="/shopadmin">我是商家</a></div>
                        <div class="RightNav">
                        <a href="/shopuser/zhuce">商家入驻</a></div>
                </div>
                @else
                <div class="Topnav">    
                    <div class="LeftNav">
                        <a href="/user/logout">退出</a>
                    </div>
                    <div class="RightNav">
                        <img src="{{session('uinfo')->pic}}" style="width:35px;height:35px">
                        <a href="user_center.html">用户中心</a>
                        <a href="user_orderlist.html" title="我的订单">我的订单</a>
                        <a href="cart.html">购物车（0）</a>
                        <a href="user_favorites.html" title="我的收藏">我的收藏</a>
                      
                    </div>
                </div>
                @endif
            </section>

            <div class="Logo_search">
                <div class="Logo">
                    <a href='/'><img src="/home/images/logo_a.png" title="DeathGhost" alt="模板"></a>
                    <i></i>

                        <span>选择城市：<a href='/home/changecity' id='dqwza'>@if (session('dqwz'))
                            {{session('dqwz')['dqwz']}}
                        @else
                            请选择您的位置
                        @endif</a></span>
                  </div>
                <div class="Search">
                    <form method="post" id="main_a_serach" action="/shop/search">
                        <div class="Search_nav" id="selectsearch">
                            <a class="choose">餐厅</a>
                            </div>
                        <div class="Search_area" >
                            <input type="text"   id="fkeyword" name="keyword" placeholder="请输入您所需查找的餐厅名称..." class="searchbox" >
                            {{csrf_field()}}
                            <input type="submit" class="searchbutton" value="搜 索" >
                        </div>

                    </form>
                </div>
            </div>
            <nav class="menu_bg">
            </nav>

        </header>












        @section('content')
        @show

        <footer>
            <section class="Otherlink">
                <aside>
                    <div class="ewm-left">
                        <p>扫描二维码联系作者：</p>
                        <img src="/home/images/wx01.png" width="100" style="float: right;">
                    </div>
                    <div class="tips">
                        <p>客服热线</p>
                        <p>
                            <i>13384616706</i>
                        </p>
                        <p>配送时间</p>
                        <p>
                            <time>00：00</time>~
                            <time>24:00</time></p>

                    </div>
                </aside>
                <section>
                    <div>
                        <span>
                            <i class="i1"></i>配送支付</span>
                        <ul>
                            <li>
                                <a href="javascript:void(0)" title="标题">支付方式</a></li>
                            <li>
                                <a href="javascript:void(0)" title="标题">配送方式</a></li>
                            <li>
                                <a href="javascript:void(0)" title="标题">配送效率</a></li>
                            <li>
                                <a href="javascript:void(0)" title="标题">服务费用</a></li>
                        </ul>
                    </div>
                    <div>
                        <span>
                            <i class="i2"></i>关于我们</span>
                        <ul>
                            <li>
                                <a href="javascript:void(0)" title="标题">招贤纳士</a></li>
                            <li>
                                <a href="javascript:void(0)" title="标题">网站介绍</a></li>
                            <li>
                                <a href="javascript:void(0)" title="标题">配送效率</a></li>
                            <li>
                                <a href="javascript:void(0)" title="标题">商家加盟</a></li>
                        </ul>
                    </div>
                    <div>
                        <span>
                            <i class="i3"></i>帮助中心</span>
                        <ul>
                            <li>
                                <a href="javascript:void(0)" title="标题">服务内容</a></li>
                            <li>
                                <a href="javascript:void(0)" title="标题">服务介绍</a></li>
                            <li>
                                <a href="javascript:void(0)" title="标题">常见问题</a></li>
                            <li>
                                <a href="javascript:void(0)" title="标题">网站地图</a></li>
                        </ul>
                    </div>
                </section>
            </section>
            <div class="copyright">© 版权所有 技术支持：司振奇 史云鹏 马占吉 聂鹏</div>
        </footer>
    </body>

</html>