@extends('layout.shophome')
   <style>
        .pagination li a{
            color: #000;
            font-size: 15px;

        }
        .pagination li span{
            color: #000;
            font-size: 20px;
        }
            .pagination li{

                float: left;
                height: 40px;
                width: 40px;
                padding: 0 10px;
                display: block;
                border-radius: 50%;
                font-size: 30px;
                line-height: 40px;
                text-align: center;
                cursor: pointer;
                outline: none;
                border:1px solid #bbb;
                text-decoration: none;


            }
            .pagination  .active{
                    color: #000;
                    border: none;
                    background-image: none;
                    background-color: #1D62F0;
            }
            .pagination .disabled{
                color: #000;
                cursor: no-drop;
            }
            .pagination{
                margin-left:700px;
            }

        </style>

@section('content')
<form class="navbar-left navbar-form nav-search mr-md-3" action="/shopadmin/xxcps">
            <div class="input-group">
              <input type="text" placeholder="Search ..." class="form-control" name="name">
              <div class="input-group-append">
                <span class="input-group-text">
                  <button class="la la-search search-icon"></button>
                </span>
              </div>
            </div>
          </form>
<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th scope="col" style='text-align: center'>id</th>
            <th scope="col" style='text-align: center'>菜品名称</th>
            <th scope="col" style='text-align: center'>所属类别</th>
            <th scope="col" style='text-align: center'>菜品描述</th>
            <th scope="col" style='text-align: center'>菜品单价</th>
            <th scope="col" style='text-align: center'>图片</th>
            <th scope="col" style='text-align: center'>状态</th>
            <th scope="col" style='text-align: center'>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach($xxcps as $xxcp)
        <tr>
            <td style='text-align: center'>{{$xxcp->id}}</td>
            <td style='text-align: center'>{{$xxcp->cpname}}</td>
            <td style='text-align: center'>
                @foreach ($cplbs as $cplb)
                    @if ($cplb->id == $xxcp->gtid)
                        {{$cplb->lbname}}
                    @endif
                @endforeach
            </td>
            <td style='text-align: center'>{{$xxcp->cpms}}</td>
            <td style='text-align: center'>￥{{$xxcp->price}}</td>
            <td style='text-align: center'>
                <img src="{{$xxcp->cppic}}" width="70">
            </td>
            <td style='text-align: center'>
                @if($xxcp->zs == 1)
                    有货
                @else
                    已卖光
                @endif
            </td>
            <td style='text-align: center'>
                <button onclick='window.location.href="/shopadmin/xxcp/{{$xxcp->id}}/edit"' >
                    <i class="la la-eyedropper"></i>
                </button>
                <form action="/shopadmin/xxcp/{{$xxcp->id}}" method='post' style='display:inline'>
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
       <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                   {{ $xxcps->appends(['name' => $name])->links() }}


                </div>


    <button style="float: right; margin-right: 170px;" onclick="window.location.href='/shopadmin/xxcp/create'"><i class="la la-plus"></i>添加</button>

@endsection