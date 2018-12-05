@extends('layout.home')

@section('title','好吃喵')

@section('content')

@if(session('qqid'))

<section class="Psection MT20">
 <form action="/user/qq/no/doband" method="post">
  <table class="login">
  <tbody><tr>
  <td width="40%" align="right" class="FontW">账号：</td>
  <td><input type="text" name="username" required="" autofocus="" placeholder="账号/电子邮件/手机号码"></td>
  </tr>
  <tr>
  <td width="40%" align="right" class="FontW">密码：</td>
  <td><input type="password" name="pass" required=""></td>
  </tr>
  {{csrf_field()}}
  <tr>
  <td width="40%" align="right"></td>
  <td><input type="submit" name="" value="登 录" class="Submit_b"></td>
  </tr>
  </tbody></table>
 </form>
</section>




@else
<script type="text/javascript">
	alert('请登录');
	window.location.href = '/';
</script>
@endif
@stop