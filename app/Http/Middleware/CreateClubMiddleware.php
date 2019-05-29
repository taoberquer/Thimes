<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CreateClubMiddleware
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
        if (!empty(Auth::user()->getClub())) {
            return redirect()->route('club.index')->with('error', 'Vous appartennez déjà à un club.');
        }

        return $next($request);
    }
}
