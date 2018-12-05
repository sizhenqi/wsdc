<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Buyusers;
use App\Library\Ucpaas;
use Laravel\Socialite\Facades\Socialite;

class BuyuserController extends Controller
{
    //前台用户注册
    public function zhuce(Request $request){
    	if(!session('zcyzm')){
            return '请发送验证码';
    	}
        if(session('zcyzm') != $request->input('yzm')){
            session(['zcyzm'=>'']);
            return '验证码错误';
        }
        if(!$request->input('telnumber')){
            return '请填入手机号';
        }
        if(!$request->input('username')){
            return '用户名不能为空';
        }
        $ename = Buyusers::where('username',$request->input('username'))->first();
        if($ename){
            return '该用户已存在';
        }
        if(!$request->input('pass') ){
            return '密码不能为空';
        }
        if($request->input('pass') != $request->input('repass')){
            return '两次密码不同';
        } 
    	$res = new Buyusers;
    	$res -> username = $request -> input('username');
    	$res -> phone = $request -> input('telnumber');
    	$res -> pass = $request -> input('pass');
    	
        $r = $res -> save();
        if($r)
        {
            session(['zcyzm'=>'']);
            return 1;
        }else{
            return '请检查网络后重试';
        }
       
    }
    //登录注册的短信验证
    public function zhuceapi(Request $request){
    	$num = $request->input('number');
    	$options['accountsid']='c4af4bf923559718b3076893933dadc4';
		//填写在开发者控制台首页上的Auth Token
		$options['token']='1f01693ad62f7193ef8d86246cf49b28';
		//初始化 $options必填
		$ucpass = new Ucpaas($options);
		$appid = "0eedf89c80694a7583a189d6999053b3";	//应用的ID，可在开发者控制台内的短信产品下查看
		$templateid = "401352";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
		$yzm = rand(11111,99999);
		$param = $yzm; //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
		$mobile = $num;
		$uid = "";
		$ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
		session(['zcyzm'=>$yzm]);
    }

    //qq第三方登录
    public function qqRedirect()
    {
        return Socialite::with('qq')->redirect();
    }
    //qq回调
    public function qqCallback()
    {
        $user = Socialite::driver('qq')->user();
        $qqid = $user->getId();
        $res = Buyusers::where('qqid',$qqid)->first();
        if($res){
            session(['uinfo'=>$res]);
            return redirect('/')->with('info','登陆成功，祝您用餐愉快!');
        }else{
            session(['qqid'=>$qqid]);
            return redirect('/user/qq/no');
        }
        
    }

    public function login(Request $request){
        if(!$request->input('username')){
            return '请输入用户名';
        }
        $res = Buyusers::where('username',$request->input('username'))->first();
        if(!$res){
            return '用户名或密码错误';
        }else{
            if($res->pass !== $request->input('pass')){
                return '用户名或密码错误';
            }
        }
        session(['uinfo'=>$res]);
        return 1;
    }
    public function logout(){
        session(['uinfo'=>'']);
        return back()->with('info','退出成功');
    }




    //找回表单提交
    public function zhaohui(Request $request){
        if(!session('zhyzm')){
            return '请发送验证码';
        }
        if(session('zhyzm') != $request->input('yzm')){
            session(['zhyzm'=>'']);
            return '验证码错误';
        }
        if(!$request->input('telnumber')){
            return '请填入手机号';
        }
        if(!$request->input('username')){
            return '用户名不能为空';
        }
        $ename = Buyusers::where('username',$request->input('username'))->first();
        if(!$ename){
            return '该用户不存在';
        }
        if($enum->phone != $request->input('telnumber')){
            return '该用户的手机不正确';
        }
        if(!$request->input('pass') ){
            return '密码不能为空';
        }
        if($request->input('pass') != $request->input('repass')){
            return '两次密码不同';
        }
        $ename->pass = $request->input('pass');
        $r = $ename->save();
        if($r)
        {
            session(['zhyzm'=>'']);
            return 1;
        }else{
            return '请检查网络后重试';
        }
    }




    //找回短信验证
    public function zhaohuiapi(Request $request){
        $num = $request->input('number');
        $options['accountsid']='c4af4bf923559718b3076893933dadc4';
        //填写在开发者控制台首页上的Auth Token
        $options['token']='1f01693ad62f7193ef8d86246cf49b28';
        //初始化 $options必填
        $ucpass = new Ucpaas($options);
        $appid = "0eedf89c80694a7583a189d6999053b3";    //应用的ID，可在开发者控制台内的短信产品下查看
        $templateid = "401352";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
        $yzm = rand(11111,99999);
        $param = $yzm; //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
        $mobile = $num;
        $uid = "";
        $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
        session(['zhyzm'=>$yzm]);
    }

    public function noqq(){
        return view('home.noqq');
    }

    public function noqqzc(Request $request){
        // if(!session('zcyzm')){
        //     return back()->with('info','请发送验证码');
        // }
        // if(session('zcyzm') != $request->input('yzm')){
        //     session(['zcyzm'=>'']);
        //     return back()->with('info','验证码错误');
        // }
        if(!$request->input('tel')){
            return back()->with('info','请填入手机号');
        }
        if(!$request->input('username')){
            return back()->with('info','用户名不能为空');
        }
        $ename = Buyusers::where('username',$request->input('username'))->first();
        if($ename){
            return back()->with('info','该用户已存在');
        }
        if(!$request->input('pass') ){
            return back()->with('info','密码不能为空');
        }
        if($request->input('pass') != $request->input('repass')){
            return back()->with('info','两次密码不同');
        } 
        $res = new Buyusers;
        $res -> username = $request -> input('username');
        $res -> phone = $request -> input('tel');
        $res -> pass = $request -> input('pass');
        $res -> qqid = session('qqid');
        
        $r = $res -> save();
        if($r)
        {
            session(['zcyzm'=>'']);
            session(['qqid'=>'']);
            return back()->with('info','注册成功');
        }else{
            return back()->with('info','请检查网络后重试');
        }
    }


    public function noqqband(){
        return view('home.noqqband');
    }
    //已有账号绑定qq
    public function noqqdoband(Request $request){
        if(!$request->input('username')){
            return back() ->with('info','请输入用户名');
        }
        $res = Buyusers::where('username',$request->input('username'))->first();
        if(!$res){
            return back() ->with('info','用户名或密码错误');
        }else{
            if($res->pass !== $request->input('pass')){
                return back() ->with('info','用户名或密码错误');
            }
        }
        if($res -> qqid != ''){
            return back() ->with('info','该账号已被绑定,请检查后重试');
        }
        $res -> qqid = session('qqid');
        $res -> save();
        session(['qqid'=>'']);
        return back()->with('info','绑定成功');
    }
}
