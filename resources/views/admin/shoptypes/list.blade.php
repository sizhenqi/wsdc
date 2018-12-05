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
	            @if(session('info'))
	            	{{session('info')}}
	            @endif
       	    </div>
            <div class="x-body">
                <div class="layui-row">
                    <form class="layui-form layui-col-md12 x-so">
                       
                     	店铺名称： <input type="text" name="shopname" value="{{$request->shopname}}"class="layui-input" placeholder="请输入店铺名称"  id="end">
                        店铺地址： <input type="text" name="address" value="{{$request->address}}"class="layui-input" placeholder="请输入店铺地址"  id="end">
                        
                        <button class="layui-btn" lay-submit="" lay-filter="sreach">
                            <i class="layui-icon">
                                &#xe615;
                            </i>
                        </button>
                    </form>
                </div>
                <xblock>
                     <a href="" class="layui-btn layui-btn-info" >
                        {{$t}}                       
                    </a>
                    <a href="/admin/shoptypes/delete/{{$id}}" class="layui-btn layui-btn-danger" >
                        <i class="layui-icon">
                            
                        </i>
                        删除此类别
                    </a>
                    
                    <span class="x-right" style="line-height:40px">
                        共有数据：{{$res->total()}} 条
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
                                id
                            </th>
                            <th>
                                店铺名称
                            </th>
                            <th>
                                店铺类型
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
                               审核状态 
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
                               {{$v->id}}
                            </td>
                            <td>
                                <a href="/admin/goods/list/{{$v->id}}">
                                    {{$v->shopname}}
                                </a>
                            </td>
                           	   
                            <td>
                            	@foreach($shoptypes as $key => $val)
                            		@if($v->stid == $val->id)
                                    	{{$val->type}}
                               	    @endif
                                @endforeach
                            </td>
                               
                            	
                            <td>
                                {{$v->address}}
                            </td>
                            <td>
                               <img src="{{$v->logo}}" width="70px" heigit="70px"> 
                            </td>
                            <td>
                                {{$v->tel}}
                            </td>
                            
                            	
                            <td class="td-manage">                                                                                                                           
                                @if($v->status == 1)
					                <a onclick="member_stop(this,'10001')" href="javascript:;"  value="{{$v->id}}"  title="点击停业" class="layui-btn btn-success ">
					                	营业中
					                </a>
					           
					            @else
					                <a onclick="member_stop(this,'10001')" href="javascript:;"  value="{{$v ->id}}" title="点击营业" class="layui-btn btn-danger ">
					               	    停业
					                </a>					           
					            @endif
                            </td>   
                           
                            <td>
                                @if($v->shstatus == 2)  
                                <span class="layui-btn layui-btn-normal layui-btn-mini">已审核</span>
                                @else
                                <span class="layui-btn layui-btn-danger layui-btn-mini">待审核</span>
                                @endif
                            </td>
                           
                            <td class="td-manage">
                                
                                <a title="修改"  onclick="x_admin_show('修改','/admin/shoptypes/{{$v->id}}/edit',600,600)" href="javascript:;" class="layui-btn layui-btn-normal" value="{{$v->stid}}">
                                    <i class="layui-icon">
                                        &#xe63c;
                                    </i>
                                    修改
                                </a>                                  
                                
                                <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;" class="layui-btn layui-btn-danger" value="{{$v->stid}}">
                                    <i class="layui-icon">&#xe640;</i>删除
                                </a>
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

			$('.mws-form-message').delay(2000).fadeOut(2000);

		</script>
		
        

        <script>


        	function member_stop(obj,id){
		        layer.confirm('确认要修改吗？',function(index){
		            //var id = $(obj).parent().parent().children().eq(1).text();
		            var id = $(obj).attr("value");
                    $.ajax({
                        type:'GET',
                        url:"/admin/shoptypes/ajax",
                        data:{'id':id},
                        dataType:"json",
                        success:function(data){

                            if(data == 1){
                            	$(obj).attr('class','layui-btn btn-success');
                            	$(obj).html('营业中');
                            	$(obj).attr('title','点击停业');
                            	layer.msg('营业中！！！',{icon: 1,time:2000});

                            }
                            if(data == 0){
                              	$(obj).attr('class','layui-btn btn-danger');
                              	$(obj).html('停业');
                              	$(obj).attr('title','点击营业');
                              	layer.msg('停业中！！！',{icon: 1,time:2000});
                            }
                        }
                    });
		        });
		    }
        
      
		    /*删除*/
		    function member_del(obj,id){
		        layer.confirm('确认要删除吗？',function(index){
		        var id = $(obj).parent().parent().children().eq(1).text();
		        var stid = $(obj).attr("value");
		            //发异步删除数据
		            $.ajax({
		                type:'GET',
		                url:"/admin/shoptypes/ajaxdelete",
		                data:{'id':id,'stid':stid},
		                dataType:"json",
		                success:function(data){
		                    if(data == 1){
		                        $(obj).parents("tr").remove();
		                        layer.msg('已删除!',{icon:1,time:1000});
		                        window.location.href="/admin/shoptypes/list/"+stid;
		                    }
		                   
		                }
		            })                            
		        });
		    }
		      function delAll (argument) {

		        var data = tableCheck.getData();
		  
		        layer.confirm('确认要删除吗？'+data,function(index){
		            //捉到所有被选中的，发异步进行删除
		            layer.msg('删除成功', {icon: 1});
		            $(".layui-form-checked").not('.header').parents('tr').remove();
		        });
		    }
        </script>
       
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>


   
   
   