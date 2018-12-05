<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frilinks;
use App\Model\Shopusers;
use App\Model\Shoptypes;

class IndexController extends Controller
{
    //显示首页
    public function index(){
    	//如果未定位,跳到选择位置页面
    	if(!session('dqwz')){
		return redirect('/home/changecity');
		}

		//查询数据遍历首页
		//友情链接
		$frilinks = Frilinks::get();
		//店铺类别
		$shoptype = Shoptypes::get();
		//所有商铺
		$shop = Shopusers::get();
	    return view('home/index',['frilinks'=>$frilinks,'shoptype'=>$shoptype,'shop'=>$shop]);
    }
    //店铺首页
    public function shopshow($id){
    	
    	return view('home.shopshow');
    }
}
