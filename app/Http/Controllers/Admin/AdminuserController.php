<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Adminusers;

class AdminuserController extends Controller
{
    //
    public function adminlist(Request $request)
    {



    	$res = Adminusers::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('username');
                $phone = $request->input('phone');
                $qq = $request->input('qq');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('username','like','%'.$username.'%');
                }

            })
        ->paginate($request->input('num', 3));
        $username = $request->input('username');

        //显示数据总数
        $num = Adminusers::count();

        return view('admin/user/admin_list',[

            'res'=>$res,
            'request'=>$request,
            'username'=>$username,
            'num'=>$num,
        ]);


    }

    public function ajaxdelete(Request $request)
    {
    	$id = $request -> get('id');
    	$res = Adminusers::where('id',$id)->delete();
    	if($res){
    		return 1;
    	}
    	return 2;
    }


    public function adminedit($id)
    {

        $res = Adminusers::where('id',$id)->get();
        //dd($res);
    	return view('admin/user/adminedit',['res'=>$res]);
    }

    public function adminupdate(Request $request,$id)
    {
    	$username = $request ->post('username');
    	$password = $request ->post('password');

    	$res = Adminusers::find($id);
    	$res -> username = $username;
    	$res -> password = $password;

    	$res -> save();

    	echo '<script>alert("修改成功");window.location.href="/admin/adminlist";</script>';

    }

    public function adminadd()
    {
    	return view('admin/user/adminadd');
    }

    public function adminsave(Request $request)
    {
    	$res = $request->post();
    	$data = Adminusers::create($res);
    	if($data){
    		echo '<script>alert("添加成功");window.location.href="/admin/adminlist";</script>';
    	}else{
    		echo '<script>alert("操作无效");window.location.href="/admin/adminlist";</script>';
    	}
    }

}
