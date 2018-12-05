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
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="/admin/adminlist" method="get">

          <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>

        <button class="layui-btn" onclick="x_admin_show('添加用户','/admin/adminuser/adminadd')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：{{$num}} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>

          <tr>
            <th>

            </th>
            <th>ID</th>
            <th>管理员用户名</th>
            <th>管理员密码</th>


            <th>操作</th>
        </thead>
        <tbody>
          @foreach($res as $k => $v)
          <tr>
            <td>

            </td>
            <td>{{$v->id}}</td>
            <td>{{$v -> username}}</td>
            <td>{{$v -> password}}</td>



            <td class="td-manage">
              <button class="layui-btn" onclick="x_admin_show('xiugai','/admin/adminuser/adminedit/{{$v->id}}')">修改</button>

              <!-- <a onclick="member_stop(this,'10001')" href="/admin/adminuser/adminedit/{{$v->id}}"  title="编辑" class="layui-btn layui-btn-normal">修改</a> -->
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
          {{ $res->appends(['username' => $username])->links() }}
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


      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要注销该用户吗？',function(index){

            var id = $(obj).parent().parent().children().eq(1).text();
            var a = 'false';
            $.ajax({
                type:'GET',
                url:"/admin/adminuser/ajaxdelete",
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
      })();
    </script>
  </body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT><SCRIPT Language=VBScript><!--

//--></SCRIPT>