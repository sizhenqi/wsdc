	<link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/xadmin.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/font.css">
	<link rel="stylesheet" href="/css/xadmin.css">

    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/xadmin.js"></script>
	<link rel="stylesheet" href="/css/bootstrap.min.css">

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
			    <form class="layui-form" action="/admin/shoptypes/store" method="post" enctype="multipart/form-data">
			    	<div class="mws-form-message  alert-success">
			            @if(session('info'))
			            	{{session('info')}}
			            @endif
		       	    </div>
			       
			        <div class="layui-form-item">
	                    <label for="title" class="layui-form-label">
	                        <span class="x-red">
	                        	*
	                    	</span>
	                    	类别
	                    </label>
	                    <div class="layui-input-inline">
	                        <input type="text" id="name" name="name" required="" lay-verify="required"
	                        autocomplete="off" class="layui-input">
	                    </div>
	                </div>

			        <div class="layui-form-item">			           			           
						<div class="layui-form-item">
							{{csrf_field()}}
						    <label for="L_repass" class="layui-form-label">
						    </label>
						    <input type="submit" value="添加" class="layui-btn">
						</div>
					</div>
				</form>
			</div>
		</div>
		<script>

			$('.mws-form-message').delay(2000).fadeOut(2000);
		</script>	  



   
   
   