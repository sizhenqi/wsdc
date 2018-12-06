<?php

namespace App\Http\Controllers\Shopadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goodtypes;
use App\Model\Goods;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cplbs = Goodtypes::where('shopid',session('shopinfo')->id)->get();
        if($request['name']){
        $xxcps = Goods::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $name = $request->input('name');
                //如果用户名不为空
                if(!empty($name)) {
                    $query->where('cpname','like','%'.$name.'%');
                }
            })
        ->where('suid',session('shopinfo')->id)->paginate($request->input('num', 3));
        $name = $request->input('name');
        } else {
            $xxcps = Goods::where('suid',session('shopinfo')->id)->paginate(3);
            if(!isset($name)){
                $name="";
            }
        }
        return view('/shopadmin/goods/index',['xxcps'=>$xxcps,'cplbs'=>$cplbs,'name'=>$name]);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cplbs = Goodtypes::where('shopid',session('shopinfo')->id)->get();

        return view('/shopadmin/goods/create',['cplbs'=>$cplbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $xxcps = $request->input();

        if($request->hasFile('cppic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('cppic')->getClientOriginalExtension();

            $request->file('cppic')->move('./shopadmins/uploads',$name.'.'.$suffix);

            $xxcps['cppic'] = '/shopadmins/uploads/'.$name.'.'.$suffix;

        }


        try{

            $data = Goods::create($xxcps);

            if($data){
                return redirect('/shopadmin/xxcp')->with('success','添加成功');
            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cplbs = Goodtypes::where('shopid',session('shopinfo')->id)->get();
        $xxcps = Goods::find($id);

        return view('shopadmin/goods/edit',['cplbs'=>$cplbs,'xxcps'=>$xxcps]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $xxcps = $request->input();

        if($request->hasFile('cppic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('cppic')->getClientOriginalExtension();

            $request->file('cppic')->move('./shopadmins/uploads',$name.'.'.$suffix);

            $xxcps['cppic'] = '/shopadmins/uploads/'.$name.'.'.$suffix;

        }
        try{

            $data = Goods::find($id)->update($xxcps);

            if($data){
                return redirect('/shopadmin/xxcp')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{

            $res = Goods::destroy($id);

            if($res){
                return redirect('/shopadmin/xxcp')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
  
}
