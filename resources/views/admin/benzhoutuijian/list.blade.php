  	<link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/xadmin.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/font.css">
	<link rel="stylesheet" href="/css/xadmin.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">

    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/xadmin.js"></script>

    <style>

			.pagination li a{

				color: #000;
				font-size: 20px;

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
				    font-size: 40px;
				    line-height: 40px;
				    text-align: center;
				    cursor: pointer;
				    outline: none;
				    background-color: #A4D3EE;
				    
				    text-decoration: none;
				  
				    border-right: 1px solid rgba(0, 0, 0, 0.5);
				    border-left: 1px solid rgba(255, 255, 255, 0.15);
				   
				    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
				}

				.pagination  .active{
					    color: #f0c;
					    border: none;
					    background-image: none;
					    background-color: #009688;					   					   					    
				}

				.pagination .disabled{
					color: #000;
    				cursor: no-drop;
    				
				}
				
				.pagination{
					
					margin-left:700px;
				}
				
			</style>
 <!-- 右侧主体开始 -->

        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                 
	        <div class="x-nav">               
                <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
                href="javascript:location.replace(location.href);" title="刷新">
                    <i class="layui-icon" style="line-height:30px">
                        ဂ
                    </i>
                </a>
            </div>
            <div class="mws-form-message  alert-success" >
	           
       	    </div>
            <div class="x-body">
                <div class="layui-row">
                    <form class="layui-form layui-col-md12 x-so">
                       
                     	店铺名称： <input type="text" name="shopname" value=""class="layui-input" placeholder="请输入店铺名称"  id="end">
                        店铺地址： <input type="text" name="address" value=""class="layui-input" placeholder="请输入店铺地址"  id="end">
                        
                        <button class="layui-btn" lay-submit="" lay-filter="sreach">
                            <i class="layui-icon">
                                &#xe615;
                            </i>
                        </button>
                    </form>
                </div>
                <xblock>
                    <span class="x-right layui-btn layui-btn-normal" style="line-height:40px">
                        共有数据：{{$res->total()}}条
                    </span>
                </xblock>
                <table class="layui-table">
                    <thead>
                        <tr>
                            <th>
                                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary">
                                    <i class="layui-icon">
                                        &#xe605;
                                    </i>
                                </div>
                            </th>
                           
                            <th>
                                店铺名称
                            </th>
                            
                            <th>
                                店铺地址
                            </th>
                            <th>
                               店铺图片
                            </th>
                            
                            <th>
                               联系方式 
                            </th>
                            <th>
                               状态 
                            </th>
                            
                            <th>
                                操作
                            </th>
                            
                    </thead>
                    <tbody>
                    	@foreach($res as $k => $v)
                        <tr>
                            <td>
                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'>
                                    <i class="layui-icon">
                                        &#xe605;
                                    </i>
                                </div>
                            </td>

                           
                            <td>
                                {{$v->shopname}}
                            </td>
                           	                                                                                         	
                            <td>
                                 {{$v->address}}
                            </td>
                            <td>
                               <img src=" {{$v->logo}}" width="70px" heigit="70px"> 
                            </td>
                            <td>
                                {{$v->tel}}
                            </td>
                            <td>
                            	@if($v->status == 1)  
                            	<span class="layui-btn layui-btn-normal layui-btn-mini">营业中</span>
                                @else
                                <span class="layui-btn layui-btn-danger layui-btn-mini">停业</span>
                                @endif
                            </td>
                           
                           
                            <td class="td-manage">                                                                                                                           
                                @if($v->tuijian == 1)
					                <a onclick="member_stop(this,'10001')" href="javascript:;"  value="{{$v->id}}"  title="点击推荐" class="layui-btn btn-danger ">
					                	未推荐
					                </a>
					           
					            @else
					                <a onclick="member_stop(this,'10001')" href="javascript:;"  value="{{$v ->id}}" title="点击取消推荐" class="layui-btn btn-success ">
					               	    已推荐
					                </a>					           
					            @endif
                            </td>                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
				
					{{$res->appends(['shopname'=>$shopname,'address'=>$address])->links()}}

           	    </div>

            </div>
    	</div>  	
		
		
        <script>
        	function member_stop(obj,id){
		        layer.confirm('确认要修改吗？',function(index){
		            //var id = $(obj).parent().parent().children().eq(1).text();
		            var id = $(obj).attr("value");
                    $.ajax({
                        type:'GET',
                        url:"/admin/benzhoutuijian/ajax",
                        data:{'id':id},
                        dataType:"json",
                        success:function(data){

                            if(data == 2){
                            	$(obj).attr('class','layui-btn btn-success');
                            	$(obj).html('已推荐');
                            	$(obj).attr('title','点击取消推荐');
                            	layer.msg('推荐成功!',{icon: 1,time:2000});

                            }
                            if(data == 1){
                              	$(obj).attr('class','layui-btn btn-danger');
                              	$(obj).html('未推荐');
                              	$(obj).attr('title','点击推荐');
                              	layer.msg('取消推荐成功!',{icon: 1,time:2000});
                            }
                        }
                    });
		        });
		    }
        </script>

       


      

   
   
   