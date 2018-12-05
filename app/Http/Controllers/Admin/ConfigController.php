<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Model\Config;
use App\Http\Controllers\Controller;

use DB;
class ConfigController extends Controller
{
    //


    public function config()

    {
    	$res = DB::table('config') -> get();

    	//dd($res);

        return view('admin/config/config',['res'=>$res]);
    }

    public function configedit($id)
    {

    	$res = DB::table('config') -> where('id',$id)-> get();
    	//dd($res);


    	return view('admin/config/config_update',['res'=>$res]);
    }

    public function configupdate(Request $request,$id)
    {

    	$res = Config::find($id);

    	if($request->hasFile('pic')){
            //自定义名字
            $name = rand(111,999).time();


            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();


            $request->file('pic')->move('./admins/uploads',$name.'.'.$suffix);


            $res['logo'] = '/admins/uploads/'.$name.'.'.$suffix;




        }


    	$res->title = $request -> post('title');
    	$res->description = $request -> post('description');
    	$res->keywords = $request -> post('keywords');
    	$res->copyright = $request -> post('copyright');



    	$res -> save();

    	echo '<script>alert("修改成功");window.location.href="/admin/config";</script>';


    }

    public function ajax1()
    {
    	$res = Config::find(1);
    	if($res->status == 1){
    		$res->status = '2';
    		$res->save();
    		return 2;
    	}
    	if($res->status == 2){
    		$res->status = '1';
    		$res->save();
    		return 1;
    	}



    }


}

