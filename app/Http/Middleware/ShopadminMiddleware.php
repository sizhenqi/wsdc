<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Shopusers;

class ShopadminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session('shopinfo')){
            return redirect('/shopadmin/login');
        }
        $res = Shopusers::find(session('shopinfo')->id);
        session(['shopinfo'=>$res]);
        return $next($request);
    }
}
