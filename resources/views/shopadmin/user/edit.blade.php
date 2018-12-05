@extends('layout.shophome')

@section('content')
    <form action="/shopadmin/update" method="post"  enctype='multipart/form-data'>
        {{csrf_field()}}
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col" style='text-align: right' >店铺名字:</th>
                    <th scope="col" style='text-align: left'>
                        <input class="form-control" type="text" name="shopname" value="{{$suser->shopname}}">
                    </th>
                </tr>
            </thead>
            <toody>
            <tr>

                <th style='text-align: right'>店铺类别:</th>
                <th style='text-align: left'>
                    <select class="form-control input-square" id="squareSelect" name="stid" >
                        @foreach ($types as $type)
                            @if($suser->stid == $type->id)
                                <option value="{{$type->id}}" selected >{{$type->type}}</option>
                            @else
                                <option value="{{$type->id}}" >{{$type->type}}</option>
                            @endif
                        @endforeach
                    </select>
                </th>
            </tr>
            <tr>
                <th style='text-align: right'>店铺地址:</th>
                <th style='text-align: left'>
                    <input class="form-control" type="text" name="address" value="{{$suser->address}}">
                </th></th>
            </tr>
            <tr>
                <th style='text-align: right'>店铺图片:</th>
                <th style='text-align: left'><img src="{{$suser->logo}}"></th>
            </tr>
            <tr>
                <th style='text-align: right'>修改图片</th>
                <th style='text-align: left'>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="logo">
                </th>
            </tr>
            <tr>
                <th style='text-align: right'>店铺电话:</th>
                <th style='text-align: left'>
                <input class="form-control" type="text" name="tel" value="{{$suser->tel}}">
            </th>
            </tr>
            <tr>
                <th style='text-align: right'>店铺状态:</th>
                <th style='text-align: left'>
                    @if($suser->status == 1)
                    <label class="form-radio-label">
                        <input class="form-radio-input" type="radio" name="status" value="1" checked="" >
                        <span class="form-radio-sign">开启</span>
                    </label>
                    <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="status" value="0">
                        <span class="form-radio-sign">关闭</span>
                    </label>
                    @else
                    <label class="form-radio-label">
                        <input class="form-radio-input" type="radio" name="status" value="1"  >
                        <span class="form-radio-sign">开启</span>
                    </label>
                    <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="status" value="0" checked="">
                        <span class="form-radio-sign">关闭</span>
                    </label>
                    @endif
                </th>
            </tr>
        </toody>
        </table>

        <input style="float: right; margin-right: 600px;" type="submit" value="确定修改">
    </form>
@endsection