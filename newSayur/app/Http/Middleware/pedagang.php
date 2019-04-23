<?php

namespace App\Http\Middleware;

use Closure;

class pedagang
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
        if(auth()->user()->akses == 2){
            return redirect('/mapspedagang');
        }else{
            return $next($request);
      }
       return redirect('home');
    }
}
