<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frilinks;
use DB;

class FriController extends Controller
{
    public function index(Request $request)
    {
    	//$res = frilinks::paginate($request->input('num',2));
    	$res = Frilinks::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $title = $request->input('title');
                $url = $request->input('url');
                //如果标题不为空
                if(!empty($title)) {
                    $query->where('title','like','%'.$title.'%');
                }
                //如果网址不为空
                if(!empty($url)) {
                    $query->where('url','like','%'.$url.'%');
                }
            })
        ->paginate($request->input('num', 1));
        $title = $request->input('title');
        $url = $request->input('url');
    	return view('admin.frilinks.list',[   		
    		'res'=>$res,
    		'request'=>$request,
    		'title'=>$title,
    		'url'=>$url		
    	]);
    }

    public function create()
    {	   	   	
    	return view('admin.frilinks.create',['title'=>'添加友情链接',]);
    }

    public function store(Request $request)
    {
    	$res = $request->except('_token');
		//dump($res);
		if($request->hasFile('pic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./uploads',$name.'.'.$suffix);

            $res['pic'] = '/uploads/'.$name.'.'.$suffix;

            try{

	            $data = Frilinks::create($res);
	            
	            if($data){
	                return redirect('/admin/frilinks/list')->with('info','添加成功');
	            }

	       		}catch(\Exception $e){

	            	return back()->with('info','添加失败');
	        }
        }
    }
    
    public function edit($id)
    {
        //
        // 根据id获取数据
        $res = Frilinks::find($id);
        //dd($res);
        return view('admin.frilinks.edit',[
            'title'=>'友情链接修改页面',
            'res'=>$res
        ]);
    }

    public function update(Request $request, $id)
    {
        //表单验证

        //unlink

        $res = $request->except('_token','pic','_method');

        if($request->hasFile('pic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./uploads',$name.'.'.$suffix);

            $res['pic'] = '/uploads/'.$name.'.'.$suffix;

        }

        //数据表修改数据
        try{

            $data = Frilinks::where('id', $id)->update($res);
            
            if($data){
                return redirect('/admin/frilinks/list')->with('info','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('info','修改失败');
        }
    }

    public function delete($id)
    {
        //

        //删除图片  头像
        //unlink

         try{

            $res = Frilinks::destroy($id);
            
            if($res){
                return redirect('/admin/frilinks/list')->with('info','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('info','删除失败');
        }


    }

     public function ajaxdelete(Request $request)
    {
        $id = $request -> get('id');
        $res = Frilinks::where('id',$id)->delete();
        if($res){
            return 1;
        }


    }

}
