	<link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/xadmin.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/font.css">
	<link rel="stylesheet" href="/css/xadmin.css">

    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/xadmin.js"></script>
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
            
            <div class="x-body">
			    <form class="layui-form" action="/admin/frilinks/update/{{$res->id}}" method="post" enctype="multipart/form-data">
			        <div class="layui-form-item">
			            <label for="title" class="layui-form-label">
			                <span class="x-red">
			                    *
			                </span>
			                标题
			            </label>
			            <div class="layui-input-inline">
			                <input type="text" id="title" name="title" value="{{$res->title}}" required="" lay-verify="required"
			                autocomplete="off" class="layui-input">
			            </div>
			        </div>

			        <div class="layui-form-item">
			            <label for="descript" class="layui-form-label">
			                <span class="x-red">
			                    *
			                </span>
			                描述
			            </label>
			            <div class="layui-input-inline">
			                <input type="text" id="descript" name="descript" value="{{$res->descript}}" required="" lay-verify="required"
			                autocomplete="off" class="layui-input">
			            </div>
			        </div>

			        <div class="layui-form-item">
			            <label for="url" class="layui-form-label">
			                <span class="x-red">
			                    *
			                </span>
			                链接地址
			            </label>
			            <div class="layui-input-inline">
			                <input type="text" id="url" name="url" value="{{$res->url}}" required="" lay-verify="required"
			                autocomplete="off" class="layui-input">
			            </div>
			        </div>

			        <div class="layui-form-item">
			            <label for="pic" class="layui-form-label">
			                <span class="x-red">
			                    *
			                </span>
			                链接图片
			            </label>
			            <div class="layui-input-inline">
			                <input type="file" id="pic" name="pic" required="" lay-verify="required"
			                autocomplete="off" class="layui-input" >			               
			            </div>
			            <img src="{{$res->pic}}" width="50px">
			        </div>	

			        <div class="layui-form-item">			           			           
						<div class="layui-form-item">
							{{csrf_field()}}
						    <label for="L_repass" class="layui-form-label">
						    </label>
						    <input type="submit" value="修改" class="layui-btn">
						</div>
					</div>
				</form>
			</div>
		</div>
			  



   
   
   