<?php

namespace App\Http\Controllers\Shopuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Shoptypes;
use App\Model\Shopusers;

class UserController extends Controller
{
    //商家入驻
    public function zhuce(){
    	$res = Shoptypes::get();
    	return view('shopuser.zhuce',['type'=>$res]);
    }
    public function dozhuce(Request $request){
    	if($request -> input('shopname') == ''){
    		return back()->with('info','店铺名不能为空');
    	}
    	if($request -> input('name') == ''){
    		return back()->with('info','登录名不能为空');
    	}
    	$res = Shopusers::where('tel',$request->input('name'))->first();
    	if($res){
    		return back()->with('info','该用户名已被注册');
    	}
    	if($request -> input('pass') == ''){
    		return back()->with('info','密码不能为空');
    	}
    	if($request -> input('repass') != $request -> input('pass')){
    		return back()->with('info','两次密码不一致');
    	}
    	if($request -> input('adress') == ''){
    		return back()->with('info','请选择地址');
    	}
    	if($request->input('xxdz') == ''){
    		return back()->with('info','请输入详细地址');
    	}
    	$path = $request->file('logo')->store('');
    	$obj = new Shopusers;
    	$obj -> shopname = $request->input('shopname');
    	$obj -> logo = '/uploads/'.$path;
    	$obj -> pass = $request->input('pass');
    	$obj -> name = $request->input('name');
    	$obj -> tel = $request->input('tel');
    	$obj -> stid = $request->input('stid');
    	$obj -> wzzb = $request->input('adress');
    	$obj -> address = $request->input('xxdz');
    	if($obj -> save()){
    		return redirect('/')->with('info','商家入驻请求发送成功,等待审核');
    	};


    }
}
