<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Buyusers;

class UserController extends Controller
{
    //
    public function userlist()
    {

        // $res = Buyusers::get();
        $res = Buyusers::paginate(3);
        $num = Buyusers::count();
        //dd($res);
        if(!isset($username)){
            $username="";
        }

        if(!isset($phone)){
            $phone="";
        }

    	return view('admin/user/user_list', ['res'=>$res,'username'=>$username,'phone'=>$phone,'num'=>$num]);
    }


    public function ajaxupdate(Request $request)
    {
        $id = $request -> get('id');
        $res = Buyusers::find($id);
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

    public function ajaxdelete(Request $request)
    {
        $id = $request -> get('id');
        $res = Buyusers::where('id',$id)->delete();
        if($res){
            return 1;
        }

    }

    public function select(Request $request)
    {


        $res = Buyusers::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('username');
                $phone = $request->input('phone');
                $qq = $request->input('qq');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('username','like','%'.$username.'%');
                }
                //如果手机号不为空
                if(!empty($phone)) {
                    $query->where('phone','like','%'.$phone.'%');
                }
                //如果QQ不为空

            })
        ->paginate($request->input('num', 3));
        $username = $request->input('username');
        $phone = $request->input('phone');

        //显示数据总数
        $num = Buyusers::count();

        return view('admin/user/user_list',[

            'res'=>$res,
            'request'=>$request,
            'username'=>$username,
            'phone'=>$phone,
            'num'=>$num,

        ]);

    }

}
