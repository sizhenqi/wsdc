<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    //
    public function storeclass()
    {
    	return view('admin/store/store_class');
    }

    public function check()
    {
    	return view('admin/store/check');
    }
}
