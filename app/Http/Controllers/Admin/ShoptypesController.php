<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Shoptypes;
use App\Model\Shopusers;
use DB;

class ShoptypesController extends Controller
{
    public function index(Request $request)
    {
    	$res = Shoptypes::get();
    	//dd($res);
    	return view('admin.index',['res'=>$res]);	    		   	
    }

    public function create()
    {	   	   	
    	return view('admin.shoptypes.create',['title'=>'添加商铺类别',]);
    }

    public function store(Request $request)
    {
    	$res = $request->except('_token');
		//dump($res);
		try{
	        $data = Shoptypes::create($res);
	            
	        if($data){
	            return redirect('/admin/shoptypes/create')->with('info','添加成功');
	        }

	    }catch(\Exception $e){

	        return back()->with('info','添加失败');
	    }                                  
    }

    public function list(Request $request,$id)
    {
    	//dump($id)
    	
		$shoptypes = Shoptypes::get();			
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
                
            })->where([['stid',$id],['shstatus','2'],])
        ->paginate($request->input('num', 1));
        $shopname = $request->input('shopname');
        $address = $request->input('address');
        $type = Shoptypes::find($id);
        $t = $type->type;
        
    	return view('admin.shoptypes.list',[
    		'title'=>'商铺列表',
    		'res'=>$res,
    		'request'=>$request,
            'shopname'=>$shopname,
    		'address'=>$address,
    		'shoptypes'=>$shoptypes,
    		'id'=>$id,
            't'=>$t
    	]);
    }

    public function edit($id)
    {
        //
        // 根据id获取数据
        $res = Shopusers::find($id);
        $shoptypes = Shoptypes::get();
       // dump($shoptypes);
        return view('admin.shoptypes.edit',[
            'title'=>'商家修改页面',
            'res'=>$res,
            'shoptypes'=>$shoptypes
        ]);
    }

    public function update(Request $request, $id)
    {
        //表单验证

        //unlink
        $res = Shopusers::find($id);
        //dd($res);
        $stid = $res->stid;
       // dd($stid);
        //获取需要的信息
        $res = $request->except('_token','pic','_method');

        if($request->hasFile('logo')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('logo')->getClientOriginalExtension();
            //将图片保存到指定文件夹
            $request->file('logo')->move('./shoppic',$name.'.'.$suffix);
            //更新数据库中图片的路径
            $res['logo'] = '/shoppic/'.$name.'.'.$suffix;

        }

        //数据表修改数据   
        $data = Shopusers::where('id', $id)->update($res);

        if($data){
        	echo '<script>window.location.href("/admin/shoptypes/list/.$stid")</script>';
        	return back()->with('info','修改成功');
        }else{
        	return back()->with('info','修改失败');
        }                           
    }
   
    public function ajax(Request $request)
    {
    	$id = $request -> get('id');
    	$res = Shopusers::find($id);
    	
    	if($res->status == 1){
    		$res->status = '0';
    		$res->save();
    		return 0;
    	}
    	if($res->status == 0){
    		$res->status = '1';
    		$res->save();
    		return 1;
    	}
    }

    public function ajaxdelete(Request $request)
    {
        $id = $request -> get('id');
        $res = Shopusers::where('id',$id)->delete();

        if($res){
            return 1;
        }
    }

    public function delete(Request $request,$id)
    {
        //
    	
        //删除图片  头像
        //unlink   	  
    	//$shopusers = DB::table('Shopusers')->get()->where('stid',$id);
        $shopusers = DB::table('Shopusers')->where('stid', $id)->pluck('stid');     
    		
   		//dd($r);
    	if(count($shopusers)){
    		 return back()->with('info','该类别有商家，不能删除！！！');
    	}
        try{

			$res = Shoptypes::destroy($id);
            
            if($res){
                $shoptypes = DB::table('Shoptypes')->pluck('id');  
                $r = $shoptypes[0]; 
                return redirect('/admin/shoptypes/list/'.$r)->with('info','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('info','删除失败');
        }


    }

}
