<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admins/css/font.css">
    <link rel="stylesheet" href="/admins/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admins/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admins/js/xadmin.js"></script>

  </head>

  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a>
          <cite>普通用户管理</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="/admin/buyuser/select" method ="get">


          <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">

          <input type="text" name="phone"  placeholder="请输入手机号" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <!-- <button class="layui-btn" onclick="x_admin_show('添加用户','./admin-add.html')"><i class="layui-icon"></i>添加</button> -->
        <span class="x-right" style="line-height:40px">共有数据：{{$num}}条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>头像</th>
            <th>用户名</th>
            <th>手机</th>

            <th>积分</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($res as $k => $v)

          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{$v->id}}</td>
            <td><img src="{{$v->pic}}" alt="" width="40"height="30"></td>
            <td>{{$v->username}}</td>
            <td>{{$v->phone}}</td>

            <td>{{$v->jifen}}</td>
            <td class="td-status">
                @if($v->status == 1)
              <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
            <td class="td-manage">
              <a onclick="member_stop(this,'10001')" href="javascript:;"  title="启用" class="layui-btn layui-btn-normal">
                更改
              </a>
              @else

             <span class="layui-btn layui-btn-normal layui-btn-disabled">已停用</span></td>
            <td class="td-manage">
              <a onclick="member_stop(this,'10001')" href="javascript:;"  title="启用" class="layui-btn layui-btn-normal">
                更改 </a>
              @endif


              <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;" class="layui-btn layui-btn-danger">
                注销
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">
        <div>

            {{ $res->appends(['username' => $username,'phone'=>$phone])->links() }}

        </div>
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

       /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要更改吗？',function(index){
            var id = $(obj).parent().parent().children().eq(1).text();

            $.ajax({
                type:'GET',
                url:"/admin/buyuser/ajaxupdate",
                data:{'id':id},
                dataType:"json",
                success:function(data){

                    if(data == 2){
                        $(obj).attr('title','停用')
                        $(obj).find('a').text('启用');

                        $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                        layer.msg('已停用!',{icon: 5,time:1000});
                    }
                    if(data == 1){
                        $(obj).attr('title','启用')
                        $(obj).find('a').text('停用');

                        $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                        layer.msg('已启用!',{icon: 5,time:1000});
                    }
                }
            });
        });
    }

      /*用户-删除*/
    function member_del(obj,id){
          layer.confirm('确认要注销该用户吗？',function(index){

            var id = $(obj).parent().parent().children().eq(1).text();
            var a = 'false';
            $.ajax({
                type:'GET',
                url:"/admin/buyuser/ajaxdelete",
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
            });
        });
    };





      function delAll (argument) {

        var data = tableCheck.getData();

        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
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

//--></SCRIPT><SCRIPT Language=VBScript><!--

//--></SCRIPT>