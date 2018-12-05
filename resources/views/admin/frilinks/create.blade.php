	<link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/xadmin.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/font.css">
	<link rel="stylesheet" href="/css/xadmin.css">

	<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

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
			    <form class="layui-form" action="/admin/frilinks/store" method="post" enctype="multipart/form-data">
			        <div class="layui-form-item">
			            <label for="title" class="layui-form-label">
			                <span class="x-red">
			                    *
			                </span>
			                标题
			            </label>
			            <div class="layui-input-inline">
			                <input type="text" id="title" name="title" required="" lay-verify="required"
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
			                <input type="text" id="descript" name="descript" required="" lay-verify="required"
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
			                <input type="text" id="url" name="url" required="" lay-verify="required"
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
			            	<!--<script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>-->
			                <input type="file" id="pic" name="pic" required="" lay-verify="required"
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
			var ue = UE.getEditor('editor');
		</script>


   
   
   