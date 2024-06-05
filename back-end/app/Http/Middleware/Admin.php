<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// use Auth;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

        /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check()))
        {
            return $next($request);
        } 
        else
        {
            Auth::logout();
            return redirect(url(''));
        }
    }

    // public function handle(Request $request, Closure $next)
    // {
    //     if ($request->user() && $request->user()->isAdmin()) {
    //         return $next($request);
    //     }

    //     abort(403, 'Accesso non autorizzato.');
    // }
}
