@extends('layout.shophome')

@section('content')
<form action="/shopadmin/xxcp" method="post"  enctype='multipart/form-data'>
    <div class="form-group">
            <label for="squareInput">菜品名称</label>
            <input type="text" class="form-control input-square" id="squareInput" name="cpname" >
        </div>
        <div class="form-group">
            <label for="squareSelect">所属分类</label>
            <select class="form-control input-square" id="squareSelect" name="gtid" >
                @foreach ($cplbs as $cplb)
                <option value="{{$cplb->id}}">{{$cplb->lbname}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <label>是否展示</label><br/>
            <label class="form-radio-label">
                <input class="form-radio-input" type="radio" name="zs" value="1"  checked="">
                <span class="form-radio-sign">展示</span>
            </label>
            <label class="form-radio-label ml-3">
                <input class="form-radio-input" type="radio" name="zs" value="2">
                <span class="form-radio-sign">隐藏</span>
            </label>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">菜品图片</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="cppic">
        </div>
        <div class="form-group">
            <label for="comment">菜品描述</label>
            <textarea class="form-control" id="comment" rows="5" name="cpms"></textarea>
        </div>
        <div class="form-group">
            <label for="squareInput">菜品单价</label>
            <input type="text" class="form-control input-square" id="squareInput" name="price" >
        </div>
    <div class="form-group" >
        {{csrf_field()}}
    <input style="margin-left:20px;" type="submit" class="btn btn-success" value="添加" >
    </div>
</form>
@endsection