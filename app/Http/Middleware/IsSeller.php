<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class IsSeller
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
       if(Auth::check() && auth()->user()->isSeller()){
        
        return $next($request);
    }
    return redirect('login');
    }
}
