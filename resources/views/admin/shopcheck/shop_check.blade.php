<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/xadmin.js"></script>

  </head>

  <body>
    <div class="x-nav">
        @if(session('error'))
            <script>
                alert('{{session('error')}}');
            </script>
        @endif
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="/admin/shopcheck" method="get">

          <input type="text" name="name"  placeholder="请输入用户名" autocomplete="off" class="layui-input"><input type="text" name="tel"  placeholder="请输入手机号" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>

        <span class="x-right" style="line-height:40px">共有数据：{{$num}} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>id</th>
            <th>用户名</th>
            <th>店铺名</th>

            <th>联系方式</th>
            <th>地址</th>
            <th>店铺图片</th>
            <th>状态</th>
            <th>操作</th>

        </tr>
        </thead>
        <tbody>
          @foreach($res as $k => $v)
          <tr>

            <td>{{$v->id}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v -> shopname}}</td>

            <td>{{$v->tel}}</td>
            <td>{{$v->address}}</td>
            <td><img src="{{$v->logo}}" alt="" width="40" height="30"></td>
            <td class="td-status">
              <span class="layui-btn layui-btn-normal layui-btn-mini">待审核</span></td>


            <td class="td-manage">
              <a onclick="member_stop(this,'10001')" href="javascript:;"  title="启用" class="layui-btn layui-btn-normal">
                通过
              </a>
              <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;" class="layui-btn layui-btn-danger">
                不通过


            </td>
          </td>
          </tr>
        @endforeach
        </tbody>
      </table>


      <div class="page">
        {{$res->appends(['name'=>$name, 'tel'=>$tel])->links()}}
      </div>

    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

    function member_stop(obj,id){
        layer.confirm('确认要更改吗？',function(index){
            var id = $(obj).parent().parent().children().eq(0).text();

            $.ajax({
                type:'GET',
                url:"/admin/shopcheck/ajaxcheck",
                data:{'id':id},
                dataType:"json",
                success:function(data){

                    if(data == 1){
                        $(obj).attr('title','审核')
                        $(obj).find('i').html('&#xe62f;');

                        $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已审核');
                        layer.msg('已审核!',{icon: 5,time:1000});
                        window.location.reload();

                    }
                    if(data == 2){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }
                }
            });
        });
    }
    function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              var id = $(obj).parent().parent().children().eq(0).text();
              $.ajax({

                type:'GET',
                url:"/admin/shopcheck/ajaxdelete",
                data:{'id':id},
                dataType:"json",
                success:function(data){

                    if(data == 1){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                        window.location.reload();

                    }
                    if(data == 2){
                        alert('操作无效');
                    }
                }


              })

          });
    }



    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT>