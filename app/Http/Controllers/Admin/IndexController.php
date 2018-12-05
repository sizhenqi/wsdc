<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Model\Config;
use App\Http\Controllers\Controller;

use DB;
class IndexController extends Controller
{
    //
    public function index()
    {
    	return view('admin.index',['title'=>'网上订餐后台首页']);
    }




}
