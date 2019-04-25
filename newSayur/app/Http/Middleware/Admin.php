<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Admin
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
        if(Auth::User()){
        if(auth()->user()->akses == 1){
            return $next($request);
        }else{
        return redirect('home')->with('error','You dont have admin access');
      }
    }
       return redirect('home');
    }
}
