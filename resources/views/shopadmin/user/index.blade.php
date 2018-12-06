@extends('layout.shophome')

@section('content')
<table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col" style='text-align: right' >店铺名字:</th>
                <th scope="col" style='text-align: left'>{{$suser->shopname}}</th>
            </tr>
        </thead>
        <toody>
            <tr>

                <th style='text-align: right'>店铺类别:</th>
                <th style='text-align: left'>{{$types->type}}</th>
            </tr>
            <tr>
                <th style='text-align: right'>店铺地址:</th>
                <th style='text-align: left'>{{$suser->address}}</th>
            </tr>
            <tr>
                <th style='text-align: right'>店铺图片:</th>
                <th style='text-align: left'><img width="200" src="{{$suser->logo}}"></th>
            </tr>
            <tr>
                <th style='text-align: right'>店铺电话:</th>
                <th style='text-align: left'>{{$suser->tel}}</th>
            </tr>
            <tr>
                <th style='text-align: right'>店铺状态:</th>
                <th style='text-align: left'>
                    @if($suser->status == 1)
                        开启
                    @else
                        关闭
                    @endif
                </th>
            </tr>
        </toody>
        </table>
    <button style="float: right; margin-right: 600px;" onclick="window.location.href='/shopadmin/edit'">修改</button>

@endsection