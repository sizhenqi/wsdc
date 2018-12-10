<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Carts;
use App\Model\Goods;

class CartController extends Controller
{
    //添加物品ajax
    public function addfood(Request $request){

    	//先判断该用户在该家店是否有购物车
    	$res = Carts::where('uid',session('uinfo')->id)->where('shopid',$request->input('shopid'))->get();
    	$resfood = Carts::where('uid',session('uinfo')->id)->where('shopid',$request->input('shopid'))->where('fid',$request->input('cpid'))->first();
    	if(count($res)){
    		//已有购物车
    		
    		//判断是否该物品已放进购物车
    		if($resfood){
    			//有该物品
    			$resfood -> count += 1;
    			$resfood -> price += $request->input('cpjg'); 
    			$resfood -> save();
    		}else{
    			//无该物品
    			$newcart = New Carts;
				$newcart -> fid = $request->input('cpid');
				$newcart -> count = 1;
				$newcart -> price = intval($request->input('cpjg'));
				$newcart -> uid = session('uinfo')->id;
				$newcart -> shopid = $request->input('shopid');
				$newcart -> fname = strval($request->input('cpname'));
				$newcart -> danjia = intval($request->input('cpjg'));
				$newcart -> save();
    		}
    	}else{
			//没有购物车
			//判断有没有别人家的购物车
			if(count(Carts::where('uid',session('uinfo')->id)->where('shopid','!=',$request->input('shopid'))->get())){
				return 1;
			}
			$newcart = New Carts;
			$newcart -> fid = $request->input('cpid');
			$newcart -> count = 1;
			$newcart -> price = intval($request->input('cpjg'));
			$newcart -> uid = session('uinfo')->id;
			$newcart -> shopid = $request->input('shopid');
			$newcart -> fname = strval($request->input('cpname'));
			$newcart -> danjia = intval($request->input('cpjg'));
			$newcart -> save();
    	}
    }


    public function index(){
    	$res = Carts::where('uid',session('uinfo')->id)->get();
    	$goods = Goods::get();
    	return view('home.cart',['total'=>$res,'goods'=>$goods]);
    }

    public function add(Request $request){
    	$id = $request -> input('cartid');
    	$res = Carts::where('id',$id)->first();
    	$res->count += 1;
    	$res->price += $res->danjia;
    	$res->save();
    }

    public function min(Request $request){
    	$id = $request -> input('cartid');
    	$res = Carts::where('id',$id)->first();
    	$res->count -= 1;
    	$res->price -= $res->danjia;
    	$res->save();
    }
}
