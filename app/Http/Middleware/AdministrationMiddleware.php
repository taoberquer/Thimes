<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdministrationMiddleware
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
        if (Auth::user()->getStatus() != 'admin') {
            return redirect()->route('home')->with('error', 'Vous n\'avez pas accès à cette page.');
        }

        return $next($request);
    }
}
