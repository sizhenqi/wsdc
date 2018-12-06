<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Shopusers;

class SearchController extends Controller
{
    public function search(Request $request){
    	$res = Shopusers::where('shopname','like','%'.$request->input('keyword').'%')->get();
    	return view('home.searchshop',['res'=>$res]);
    }

    public function typeshow($id){
    	$res = Shopusers::where('stid',$id)->get();
    	return view('home.typeshow',['res'=>$res]);
    }
}
