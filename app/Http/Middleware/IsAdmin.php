<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
	    if (Auth::user() &&  Auth::user()->type === "Admin") {
		    return $next($request);
	    }
	    $sweet=array('title'=>'Not Allowed','message'=>'Last page you accessed is locked, You will bring a key','type'=>'error');
	    return redirect()->route('vehicles.index')->with('sweet',$sweet);
    }
}
