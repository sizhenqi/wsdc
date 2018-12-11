<?php
use Illuminate\Http\Request;
//司振奇-----------------------------------------------------------------------------------------------
// Route::get('/get',function(){
// 	//dd(GetDistance(106.237059,29.895162,106.23246,29.895162));
// 	dd(distanceBetween(106.237059,29.895162,106.323297,29.632808));
// });
Route::get('/','Home\IndexController@index');
//前台登录
Route::post('/user/login','Home\BuyuserController@login');
//前台退出
Route::get('/user/logout','Home\BuyuserController@logout');
//qq第三方登录
Route::any('/oauth/qq','Home\BuyuserController@qqRedirect');
Route::any('/oauth/qq/callback','Home\BuyuserController@qqCallback');
//qq绑定
Route::any('/user/qq/no', 'Home\BuyuserController@noqq');
Route::any('/user/qq/no/zc', 'Home\BuyuserController@noqqzc');
Route::any('/user/qq/no/band', 'Home\BuyuserController@noqqband');
Route::post('/user/qq/no/doband','Home\BuyuserController@noqqdoband');
//前台注册
Route::post('/user/zhuce','Home\BuyuserController@zhuce');
//注册发送短信验证码
Route::post('/zhuceapi','Home\BuyuserController@zhuceapi');
//前台找回密码
Route::post('/user/zhaohui','Home\BuyuserController@zhaohui');
//找回密码短信
Route::post('/zhaohuiapi','Home\BuyuserController@zhaohuiapi');
//前台设置位置
Route::get('/home/changecity', function () {
    return view('home/changecity');
});
//前台发送AJAX存session地址
Route::get('/home/setlocation',function(){
	$res = $_GET;
	session(['dqwz' =>$res]);
	return $res;
});
//商家入驻
Route::get('/shopuser/zhuce','Shopuser\UserController@zhuce');
Route::post('/shopuser/zhuce/do','Shopuser\UserController@dozhuce');
//商家首页
Route::get('/shop/show/{id}','Home\IndexController@shopshow');
Route::post('/shop/search','Home\SearchController@search');


Route::get('/shoptype/{id}','Home\SearchController@typeshow');
//添加物品到购物车存入数据库
Route::post('/addgwc','Home\CartController@addfood');
Route::get('/cart','Home\CartController@index');
//点击添加一
Route::get('/cart/add','Home\CartController@add');
//点击减少一
Route::get('/cart/min','Home\CartController@min');






//商家后台
	//商家后台的登录
	Route::get('/shopadmin/login', 'Shopadmin\ShoplogingController@loging');
    Route::post('/shopadmin/dologin', 'Shopadmin\ShoplogingController@dologin');
	//商家后台的首页
	Route::group(['middleware' => 'shopadminlogin'], function (){
	    Route::get('/shopadmin', function(){
	    	return view('layout.shophome');
	    });
	    //商家菜品分类
	    Route::resource('/shopadmin/cplb',"Shopadmin\GoodtypesController");
	    //商家菜品的详细
	    Route::resource('/shopadmin/xxcp',"Shopadmin\GoodsController");
	    //商家菜品的分页搜索
	    Route::get('/shopadmin/xxcps', 'Shopadmin\GoodsController@index');
	    
		//商家的信息
		Route::get('/shopadmin/shopuser', 'Shopadmin\ShopuserController@index');
		//商家信息的修改
		Route::get('/shopadmin/edit', 'Shopadmin\ShopuserController@edit');
		Route::post('/shopadmin/update', 'Shopadmin\ShopuserController@update');
		//退出登录
		Route::get('/shopadmin/dologout', 'Shopadmin\ShoplogingController@logout');

	});


//后台
//后台登录
    //后台的登录页面
	Route::get('/admin/login', 'Admin\LoginController@login');
	//后台登录处理
	Route::post('/admin/dologin', 'Admin\LoginController@dologin');
	//后台登录的验证码图片
	Route::any('/admin/captcha','Admin\LoginController@captcha');
//后台的首页
	Route::get('/admin/admin', 'Admin\IndexController@index');
//后台用户管理
	Route::get('/admin/userlist', 'Admin\UserController@userlist');
//后台的普通用户管理
	//后台普通用户的权限修改
	Route::get('/admin/buyuser/ajaxupdate', 'Admin\UserController@ajaxupdate');
	//后台普通用户的注销
	Route::get('/admin/buyuser/ajaxdelete', 'Admin\UserController@ajaxdelete');
	//后台普通用户的分页搜索
	Route::get('/admin/buyuser/select', 'Admin\UserController@select');
//后台的店铺审核
	Route::get('/admin/check', 'Admin\StoreController@check');
	//后台的商家店铺审核管理
	Route::get('/admin/shopcheck', 'Admin\ShopcheckController@index');
	//后台的商家店铺审核通过
	Route::get('/admin/shopcheck/ajaxcheck', 'Admin\ShopcheckController@ajaxcheck');
	//后台商家的店铺审核不通过
	Route::get('/admin/shopcheck/ajaxdelete', 'Admin\ShopcheckController@ajaxdelete');
//后台网站配置
	Route::get('/admin/config','Admin\ConfigController@config');
	//后台网站配置的内容修改
	Route::post('/admin/config/update/{id}','Admin\ConfigController@configupdate');
	//后台修改处理
	Route::get('/admin/config/edit/{id}','Admin\ConfigController@configedit');
	//后台发ajax改变网站状态
	Route::get('/admin/config/ajax1','Admin\ConfigController@ajax1');
	//2018-11-29
//后台的管理员管理
	Route::get('/admin/adminlist', 'Admin\AdminuserController@adminlist');
	//后台管理员修改
	Route::get('/admin/adminuser/adminedit/{id}', 'Admin\AdminuserController@adminedit');
	Route::post('/admin/adminuser/adminupdate/{id}', 'Admin\AdminuserController@adminupdate');
	//后台添加管理
	Route::get('/admin/adminuser/adminadd', 'Admin\AdminuserController@adminadd');
	//后台添加操作
	Route::post('/admin/adminuser/adminsave','Admin\AdminuserController@adminsave');
	//后台管理员ajax删除
	Route::get('/admin/adminuser/ajaxdelete', 'Admin\AdminuserController@ajaxdelete');
//后台友情链接
	Route::any('/admin/frilinks/list', 'Admin\FriController@index');
	Route::any('/admin/frilinks/create', 'Admin\FriController@create');
	Route::any('/admin/frilinks/store', 'Admin\FriController@store');
	Route::any('/admin/frilinks/{id}/edit', 'Admin\FriController@edit');
	Route::any('/admin/frilinks/update/{id}', 'Admin\FriController@update');
	Route::any('/admin/frilinks/delete/{id}', 'Admin\FriController@delete');
	Route::get('/admin/frilinks/ajaxdelete', 'Admin\FriController@ajaxdelete');
//商铺类别
	Route::any('/admin', 'Admin\ShoptypesController@index');
	Route::any('/admin/shoptypes/create', 'Admin\ShoptypesController@create');
	Route::any('/admin/shoptypes/store', 'Admin\ShoptypesController@store');
	Route::any('/admin/shoptypes/list/{id}', 'Admin\ShoptypesController@list');
	Route::any('/admin/shoptypes/{id}/edit', 'Admin\ShoptypesController@edit');
	Route::any('/admin/shoptypes/update/{id}', 'Admin\ShoptypesController@update');	
	Route::get('/admin/shoptypes/ajax','Admin\ShoptypesController@ajax');	
	Route::any('/admin/shoptypes/delete/{id}', 'Admin\ShoptypesController@delete');
	Route::get('/admin/shoptypes/ajaxdelete', 'Admin\ShoptypesController@ajaxdelete');
//商品管理
	Route::any('/admin/goods/list/{id}', 'Admin\GoodsController@list');
	Route::get('/admin/goods/ajax','Admin\GoodsController@ajax');	
//本周推荐
	Route::any('/admin/benzhoutuijian/list','Admin\TuijianController@list');
	Route::get('/admin/benzhoutuijian/ajax','Admin\TuijianController@ajax');