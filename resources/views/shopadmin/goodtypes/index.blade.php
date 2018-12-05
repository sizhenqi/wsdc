@extends('layout.shophome')

@section('content')
<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th scope="col" style='text-align: center'>id</th>
            <th scope="col" style='text-align: center'>类别名称</th>
            <th scope="col" style='text-align: center'>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cplbs as $cplb)
        <tr>
            <td style='text-align: center'>{{$cplb->id}}</td>
            <td style='text-align: center'>{{$cplb->lbname}}</td>
            <td style='text-align: center'>
                <button onclick='window.location.href="/shopadmin/cplb/{{$cplb->id}}/edit"' >
                    <i class="la la-eyedropper"></i>
                </button>
                <form action="/shopadmin/cplb/{{$cplb->id}}" method='post' style='display:inline'>
                    {{csrf_field()}}
                    {{method_field("DELETE")}}
                    <button>
                    <i class="la la-close"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

    <button style="float: right; margin-right: 170px;" onclick="window.location.href='/shopadmin/cplb/create'"><i class="la la-plus"></i>添加</button>

@endsection