<?php

namespace App\Http\Controllers\Shopadmin;
use App\Model\Shopusers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Session;
use Hash;

class ShoplogingController extends Controller
{
    //
    public function loging()
    {
        return view('shopadmin.loging.loging',['title'=>'商家登录']);
    }

    public function dologin(Request $request)
    {

        $name = $request -> post('shopname');
        $pass = $request -> post('shoppass');

        $res = Shopusers::where('name',$name)->first();
        if(!$res){
            return back() -> with('error','用户名或者密码错误');

        }
        $sname = $res -> name;
        $spass = $res -> pass;
        if(!($name == $sname && $pass == $spass)){
            return back() -> with('error','用户名或者密码错误');

        }
        session(['shopinfo' => $res]);
        return redirect('/shopadmin');
    }

    public function logout(){
        session(['shopinfo'=>'']);
        return back();
    }
}
