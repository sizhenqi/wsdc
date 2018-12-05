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
            <div class="mws-form-message  alert-success">
	            @if(session('info'))
	            	{{session('info')}}
	            @endif
       	    </div>
            <div class="x-body">
                <div class="layui-row">
                    <form class="layui-form layui-col-md12 x-so">
                       
                       标题： <input type="text" name="title" value="{{$request->title}}"class="layui-input" placeholder="请输入标题"  id="end">
                        网址：<input type="text" name="url" value="{{$request->url}}" placeholder="请输入网址" autocomplete="off"
                        class="layui-input">
                        <button class="layui-btn" lay-submit="" lay-filter="sreach">
                            <i class="layui-icon">
                                &#xe615;
                            </i>
                        </button>
                    </form>
                </div>
                <xblock>
                    <button class="layui-btn layui-btn-danger" onclick="delAll()">
                        <i class="layui-icon">
                            
                        </i>
                        批量删除
                    </button>
                    <button class="layui-btn" onclick="x_admin_show('添加友情链接','/admin/frilinks/create')">
                        <i class="layui-icon">
                            
                        </i>
                        添加友情链接
                    </button>
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
                                ID
                            </th>
                            <th>
                                标题
                            </th>
                            <th>
                                描述
                            </th>
                            <th>
                                链接地址
                            </th>
                            <th>
                               链接图片
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
                               {{$v->title}}
                            </td>
                            <td>
                                {{$v->descript}}
                            </td>
                            <td>
                                {{$v->url}}
                            </td>
                            <td>
                               <img src="{{$v->pic}}" width="100px" > 
                            </td>
                           
                           
                            <td class="td-manage">
                                <a href="/admin/frilinks/{{$v->id}}/edit" class="layui-btn layui-btn-normal">                               
                                    <i class="layui-icon">
                                        &#xe63c;
                                    </i>
                                    修改
                                </a>  
                                


                                
                                <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;" class="layui-btn layui-btn-danger">
                                    <i class="layui-icon">&#xe640;</i>删除
                                </a> 
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
				
					{{$res->appends(['title'=>$title,'url'=>$url])->links()}}

           	    </div>

            </div>
    	</div>  	
		<script>

			$('.mws-form-message').delay(2000).fadeOut(2000);
		</script>
		
         <script>
      
          /*用户-删除*/
          function member_del(obj,id){
              layer.confirm('确认要删除吗？',function(index){
                var id = $(obj).parent().parent().children().eq(1).text();
                //发异步删除数据
                $.ajax({
                    type:'GET',
                    url:"/admin/frilinks/ajaxdelete",
                    data:{'id':id},
                    dataType:"json",
                    success:function(data){
                        if(data == 1){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                            window.location.href="/admin/frilinks/list";
                        }
                        if(data == 2){
                            console.log(a);
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
   


   
   
   