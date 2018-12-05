<?php

namespace App\Http\Controllers\Shopadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Shopusers;
use App\Model\Shoptypes;

class ShopuserController extends Controller
{
    //
    public function index () {

        $suser = Shopusers::find(43);
        $types = Shoptypes::find($suser->stid);


        return view('/shopadmin/user/index',['suser'=>$suser,'types'=>$types]);
    }
    public function edit () {


        $suser = Shopusers::find(43);
        $types = Shoptypes::select()->get();

        return view('/shopadmin/user/edit',['suser'=>$suser,'types'=>$types]);
    }

    public function update (Request $request) {
        $shopuser = $request->input();

        if($request->hasFile('logo')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('logo')->getClientOriginalExtension();

            $request->file('logo')->move('./shopadmins/uploads',$name.'.'.$suffix);

            $shopuser['logo'] = '/shopadmins/uploads/'.$name.'.'.$suffix;

        }
        try{

            $data = shopusers::find(43)->update($shopuser);

            if($data){
                return redirect('/shopadmin/shopuser')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }
}
