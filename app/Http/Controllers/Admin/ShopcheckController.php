<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Shopusers;


class ShopcheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = Shopusers::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $name = $request->input('name');
                $tel = $request->input('tel');
                //如果用户名不为空
                if(!empty($name)) {
                    $query->where('name','like','%'.$name.'%');
                }
                //如果手机号不为空
                if(!empty($tel)) {
                    $query->where('tel','like','%'.$tel.'%');
                }
                //$query->where('status',0);
            })
        ->where('shstatus','1')->paginate($request->input('num', 3));
        $name = $request->input('name');
        $tel = $request->input('tel');
        //显示数据总数
        $num = Shopusers::where('shstatus','0')->count();
        return view('admin/shopcheck/shop_check',[

            'res'=>$res,
            'request'=>$request,
            'name'=>$name,
            'tel'=>$tel,
            'num'=>$num
        ]);


    }


    public function ajaxdelete(Request $request)
    {
        //
        $id = $request -> get('id');
        $res = Shopusers::where('id',$id)->delete();
        if($res){
            return 1;
        }
        return 2;


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function ajaxcheck(Request $request)
    {
        $id = $request ->get('id');
        $res = Shopusers::find($id);
        if($res->shstatus == 1){
            $res->shstatus = '2';
            $res->save();
            return 1;
        }
        return 2;

    }
}
