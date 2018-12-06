<?php

namespace App\Http\Controllers\Shopadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goodtypes;


class GoodtypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cplbs = Goodtypes::where('shopid',session('shopinfo')->id)->get();


        return view('/shopadmin/goodtypes/index',['cplbs'=>$cplbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('/shopadmin/goodtypes/create');
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
        $cplbs = $request->input();
        try{

            $data = Goodtypes::create($cplbs);

            if($data){
                return redirect('/shopadmin/cplb')->with('success','添加成功');
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
        $cplbs = Goodtypes::find($id);

        return view('shopadmin/goodtypes/edit',['cplbs'=>$cplbs]);
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
        $cplbs = $request->input();
        try{

            $data = Goodtypes::find($id)->update($cplbs);

            if($data){
                return redirect('/shopadmin/cplb')->with('success','修改成功');
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

            $res = Goodtypes::destroy($id);

            if($res){
                return redirect('/shopadmin/cplb')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
