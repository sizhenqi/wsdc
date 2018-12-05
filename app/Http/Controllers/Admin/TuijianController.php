<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Shopusers;
use App\Model\Shoptypes;
use DB;


class TuijianController extends Controller
{
    //
    public function list(Request $request)
    {
    	$res = Shopusers::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $shopname = $request->input('shopname');                
                $address = $request->input('address');                
                //如果店铺名称不为空
                if(!empty($shopname)) {
                    $query->where('shopname','like','%'.$shopname.'%');
                }
                //如果店铺地址不为空
                if(!empty($address)) {
                    $query->where('address','like','%'.$address.'%');
                }
                
            })->where([['status','1'],['shstatus','2'],])
        ->paginate($request->input('num', 2));
        $shopname = $request->input('shopname');
        $address = $request->input('address');
    	return view('admin.benzhoutuijian.list',[
    		'title'=>'本周推荐',
    		'res'=>$res,
    		'shopname'=>$shopname,
    		'address'=>$address,
    		'request'=>$request
    	]);	
    }

    public function ajax(Request $request)
    {
    	$id = $request -> get('id');
    	$res = Shopusers::find($id);
    	
    	if($res->tuijian == 1){
    		$res->tuijian = '2';
    		$res->save();
    		return 2;
    	}
    	if($res->tuijian == 2){
    		$res->tuijian = '1';
    		$res->save();
    		return 1;
    	}
    }
    
}
