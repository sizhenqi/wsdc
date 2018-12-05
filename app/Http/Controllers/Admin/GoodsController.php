<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
use App\Model\Goodtypes;
use App\Model\Shopusers;
use DB;

class GoodsController extends Controller
{
    //
    public function list(Request $request,$id)
    {
    	//dd($id);
    	//$res = Goods::where('suid',$id)->get();
    	$res = Goods::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $cpname = $request->input('cpname');                
                //如果商品名称不为空
                if(!empty($cpname)) {
                    $query->where('cpname','like','%'.$cpname.'%');
                }
                
            })->where('suid',$id)
        ->paginate($request->input('num', 5));
        $cpname = $request->input('cpname');
    	$goodtypes = Goodtypes::get();
    	$shopusers = Shopusers::get();
    	$shopname = Shopusers::where('id',$id)->pluck('shopname');
    	$sn = $shopname[0];
    	//dd($sn);
    	return view('/admin/goods/list',[
    		'res'=>$res,
    		'request'=>$request,
    		'cpname'=>$cpname,
    		'goodtypes'=>$goodtypes,
    		'shopusers'=>$shopusers,
    		'sn'=>$sn
    	]);
    }

    public function ajax(Request $request)
    {
        $id = $request -> get('id');
        $res = Goods::where('id',$id)->delete();

        if($res){
            return 1;
        }
    }
}
