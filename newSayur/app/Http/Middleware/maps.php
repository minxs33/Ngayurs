<?php

namespace App\Http\Middleware;

use Closure;

class maps
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
        if(auth()->user()->akses){
            return $next($request);
        }else{
        return redirect('home')->with('error','Kamu harus daftar dahulu <a href="{{Route("/login")}}">Klik Disini</a>');
      }
    }
}
