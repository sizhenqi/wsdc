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
    	.layui-input{
    		width:300px;
    		border-radius:10px;
    		color:#aaa;
    		display:inline;
    	}
    	.layui-form-label{
    		font-size:15px;
    		width:120px;
    	}
    	input[type="radio"]{
    		display: none;
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
			    <form class="layui-form" action="/admin/shoptypes/update/{{$res->id}}" method="post" enctype="multipart/form-data">
			        <div class="layui-form-item">
			            <label for="shopname" class="layui-form-label">
			                <span class="x-red">
			                    *
			                </span>
			                店铺名称
			            </label>
			            <div class="layui-input-inline">
			                <input type="text"  name="shopname" value="{{$res->shopname}}" required="" lay-verify="required"
			                autocomplete="off" class="layui-input" >
			            </div>
			        </div>

			        
			        <div class="layui-form-item">
			            <label for="stid" class="layui-form-label">
			                <span class="x-red">
			                *
			            	</span>
			                店铺类型
			            </label>
			            <div class="layui-inline">
			                <select id="stid" name="stid" class="">
			                    
			                    @foreach($shoptypes as $k => $v)		                    
			                    <option value="{{$v->id}}"
			                     @if($res->stid == $v->id)
			                     selected
			                     @endif
			                     >{{$v->type}}</option>		
			                    @endforeach                   
			                </select>
			            </div>
			        </div>

			        <div class="layui-form-item">
			            <label for="address" class="layui-form-label">
			                <span class="x-red">
			                    *
			                </span>
			                店铺地址
			            </label>
			            <div class="layui-input-inline">
			                <input type="text" id="address" name="address" value="{{$res->address}}" required="" lay-verify="required"
			                autocomplete="off" class="layui-input">
			            </div>
			        </div>

			        <div class="layui-form-item">
			            <label for="tel" class="layui-form-label">
			                <span class="x-red">
			                    *
			                </span>
			                联系方式
			            </label>
			            <div class="layui-input-inline">
			                <input type="text" id="tel" name="tel" value="{{$res->tel}}" required="" lay-verify="required"
			                autocomplete="off" class="layui-input">
			            </div>
			        </div>

			        <div class="layui-form-item">
			            <label for="status" class="layui-form-label">
			                <span class="x-red">
			                    *
			                </span>
			                状态
			            </label>

			            <div class="input">
			                <input type="radio" id="status" title="开" name="status" value="1" 
			              	@if($res->status == 1)
			                    checked
			                @endif			                			                 
			                >
			                <input type="radio" id="status" title="关" name="status" value="0"
			                @if($res->status == 0)
			                    checked
			                @endif			                 			                 
			                >			                
			            </div>

			        </div>

			        <div class="layui-form-item">
			            <label for="logo" class="layui-form-label">
			                <span class="x-red">
			                    *
			                </span>
			                店铺图片
			            </label>
			            <div class="layui-input-inline">
			                <input type="file" id="logo" name="logo" required="" lay-verify="required"
			                autocomplete="off" class="layui-input" style="width:230px;height:50px">			                		                
			            </div>		
			            <img src="{{$res->logo}}" width="70px" style="margin-left:40px">	           
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
		<script>

			$('.mws-form-message').delay(2000).fadeOut(2000);

		</script>	  



   
   
   