<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userIs_admin): Response
    {
        if(!empty(Auth::check()))
        {
            if(Auth::user()->is_admin == $userIs_admin)
            {
                return $next($request);
            }
            return response()->json(['You do not have permission to access for this page.']);
        }
        else
        {
            Auth::logout();
            return redirect('/');
        }
    }
}
