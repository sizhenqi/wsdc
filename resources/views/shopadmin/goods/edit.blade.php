@extends('layout.shophome')

@section('content')
<form action="/shopadmin/xxcp/{{$xxcps->id}}" method="post"  enctype='multipart/form-data'>
    <div class="form-group">
            <label for="squareInput">菜品名称</label>
            <input type="text" class="form-control input-square" id="squareInput" name="cpname" value="{{$xxcps->cpname}}" >
        </div>
        <div class="form-group">
            <label for="squareSelect">所属分类</label>
            <select class="form-control input-square" id="squareSelect" name="gtid" >
                @foreach ($cplbs as $cplb)
                    @if($cplb->id == $xxcps->gtid)
                        <option value="{{$cplb->id}}" selected >{{$cplb->lbname}}</option>
                    @else
                        <option value="{{$cplb->id}}" >{{$cplb->lbname}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <label>是否展示</label><br/>
            @if($xxcps->zs == 1)
                <label class="form-radio-label">
                    <input class="form-radio-input" type="radio" name="zs" value="1" checked="" >
                    <span class="form-radio-sign">有货</span>
                </label>
                <label class="form-radio-label ml-3">
                    <input class="form-radio-input" type="radio" name="zs" value="2">
                    <span class="form-radio-sign">已卖光</span>
                </label>
            @else
                <label class="form-radio-label">
                    <input class="form-radio-input" type="radio" name="zs" value="1"  >
                    <span class="form-radio-sign">有货</span>
                </label>
                <label class="form-radio-label ml-3">
                    <input class="form-radio-input" type="radio" name="zs" value="2" checked="">
                    <span class="form-radio-sign">已卖光</span>
                </label>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">菜品图片</label>
            <img src="{{$xxcps->cppic}}" width="200">
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="cppic">
        </div>
        <div class="form-group">
            <label for="comment">菜品描述</label>
            <textarea class="form-control" id="comment" rows="5" name="cpms">{{$xxcps->cpms}}</textarea>
        </div>
        <div class="form-group">
            <label for="squareInput">菜品价钱</label>
            <input type="text" class="form-control input-square" id="squareInput" name="price" value="{{$xxcps->price}}" >
        </div>
    <div class="form-group" >
        {{ method_field('PUT') }}
        {{csrf_field()}}
    <input style="margin-left:20px;" type="submit" class="btn btn-success" value="修改" >
    </div>
</form>
@endsection