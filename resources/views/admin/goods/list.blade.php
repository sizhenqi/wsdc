  	<title>{{$sn}}  </title>
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
					    color:red;
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
                       
                     	商品名称： <input type="text" name="cpname" value="{{$request->cpname}}"class="layui-input" placeholder="请输入商品名称"  id="end">
                        
                        <button class="layui-btn" lay-submit="" lay-filter="sreach">
                            <i class="layui-icon">
                                &#xe615;
                            </i>
                        </button>
                    </form>
                </div>
                <xblock>
                     <a href="" class="layui-btn layui-btn-info" >
                          {{$sn}}                    
                    </a>
                    
                    
                    <span class="x-right" style="line-height:40px">
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
                                id
                            </th>
                            <th>
                                商品名称
                            </th>
                            <th>
                               商品价格
                            </th>
                            <th>
                               商品类型 
                            </th>
                            <th>
                               商品图片
                            </th>
                            <th>
                               店主
                            </th>                            
                            <th>
                               展示状态
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
                                {{$v->cpname}}
                            </td>
                           	                                                                                        	
                            <td>
                              	￥{{$v->price}}
                            </td>
                            <td>
                            	@foreach($goodtypes as $key => $val)
                            		@if($v->gtid == $val->id)
                                    	{{$val->lbname}}
                               	    @endif
                                @endforeach
                              	
                            </td>
                            <td>
                               <img src="{{$v->cppic}}" width="70px" heigit="70px"> 
                            </td>
                            <td>                                                            	
                              	@foreach($shopusers as $keys => $vals)
                            		@if($v->suid == $vals->id)
                                    	{{$vals->name}}
                               	    @endif
                                @endforeach
                            </td>

                            <td>
                            	@if($v->zs == 1)
                            	<span class="layui-btn layui-btn-normal layui-btn-mini">销售中</span>
                                 @else
                                <span class="layui-btn layui-btn-danger layui-btn-mini">已售完</span>
                                @endif
                            </td>
                            
                           
                            <td class="td-manage">
                                
                                                                
                                
                                <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;" class="layui-btn layui-btn-danger" value="{{$v->suid}}">
                                    <i class="layui-icon">&#xe640;</i>删除
                                </a>
                            </td>
                            
                        </tr>
                       @endforeach
                    </tbody>
                </table>
                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
				
					{{$res->appends(['cpname'=>$cpname])->links()}}

           	    </div>


            </div>
    	</div>  	
		<script>

			$('.mws-form-message').delay(2000).fadeOut(2000);

		</script>
		
        

        <script>
      
      	/*删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                var id = $(obj).parent().parent().children().eq(1).text();
                var suid = $(obj).attr("value");
                //发异步删除数据
                $.ajax({
                    type:'GET',
                    url:"/admin/goods/ajax",
                    data:{'id':id,'suid':suid},
                    dataType:"json",
                    success:function(data){
                        if(data == 1){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                            window.location.href="/admin/goods/list/"+suid;
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


   
   
   