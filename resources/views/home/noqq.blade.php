@extends('layout.home')

@section('title','好吃喵')

@section('content')

@if(session('qqid'))
<!--Start content-->
<section class="Psection MT20">

 <form action='/user/qq/no/zc' method="post">
  <table class="Register">
  <tr>
  <td width="40%" align="right" class="FontW">用户名：</td>
  <td><input type="text" name="username" required autofocus></td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">密码：</td>
  <td><input type="password" name="pass" required></td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">再次确认：</td>
  <td><input type="password" name="repass" required></td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">手机号码：</td>
<script type="text/javascript">
    function fsyzm(obj){
        var num = $(obj).parent().prev().children().eq(0).attr('value');
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
            obj.innerHTML = '重新发送('+ time +')';
        },1000);
        setTimeout(function(){
            obj.removeAttribute('disabled');
            clearInterval(set);
            obj.style.backgroundColor = 'cyan';
            obj.innerHTML = '发送验证码';
        },60000);

    }
</script>
  <td width="20%"><input type="text" name="tel" required pattern="[0-9]{11}"></td>
    <td><button onclick="fsyzm(this)" style="background-color:#3385ff;height:45px;width:130px;border:1px solid #ddd;border-radius:20px">点击发送验证码</button></td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">手机校验码：</td>
  <td><input type="text" name="yzm" required pattern="[0-9]{5}"></td>

  </tr>

  <tr>
  <td width="40%" align="right"></td>
  {{csrf_field()}}
  <td><input type="submit" name="" class="Submit_b" value="注 册">(已有账号，<a href="/user/qq/no/band" class="BlueA">点击绑定</a> )</td>
  </tr>
  </table>
 </form>
</section>


















@else
<script type="text/javascript">
	alert('请登录');
	window.location.href = '/';
</script>
@endif


@stop