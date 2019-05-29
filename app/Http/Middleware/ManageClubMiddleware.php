<?php

namespace App\Http\Middleware;

use Closure;

class ManageClubMiddleware
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
        if (empty(Auth::user()->getClub())) {
            return redirect()->route('club.create')->with('error', 'Vous n\'appartennez à aucun club.');
        }

        return $next($request);
    }
}
