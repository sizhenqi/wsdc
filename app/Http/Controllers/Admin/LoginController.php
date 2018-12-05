<?php

namespace App\Http\Controllers\Admin;
use App\Model\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Session;
use Hash;


class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('admin.login',['title'=>'网上订餐后台登录']);
    }

    public function dologin(Request $request)
    {
    	// dd(session('code'));

        $uname = $request -> post('uname');
        // dd($uname);
    	$upass = $request -> post('upass');

        $code = $request -> post('captcha');
        //dd($code);

        if(!($code == session('code'))){

            //dd(back() -> with('error','验证码错误'));
            //session(['error'=>'验证码错误']);
            return back() -> with('error','验证码错误');
        }

        $res = Login::where('username', $uname)->first();
        if(!$res){
            return back() -> with('error','用户名或者密码错误');

        }
        $username = $res -> username;
        $password = $res -> password;
        if(!($uname == $username && $upass == $password)){
            return back() -> with('error','用户名或者密码错误');

        }
        session(['uid' => $res->id]);
        session(['username' => $res->username]);



        return redirect('/admin');


    }
    public function captcha()
    {

        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(3);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 120, $height = 45, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();

    }
}
