@extends('layout.shophome')

@section('content')
<form action="/shopadmin/cplb" method="post"  enctype='multipart/form-data'>
    <div class="form-group">
        <label for="email">类别名称</label>
        <input type="text" class="form-control" id="email" name="lbname" >

    </div>
    <div class="form-group" >
        {{csrf_field()}}
    <input style="margin-left:20px;" type="submit" class="btn btn-success" value="添加" >
    </div>
</form>
@endsection