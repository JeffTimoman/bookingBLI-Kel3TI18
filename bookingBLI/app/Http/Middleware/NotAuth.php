<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if(auth()->user()->isAdmin()){
                return redirect('admin/home')->with('success', 'Login success');
            } else if (auth()->user()->isUser()) {
                return redirect('home')->with('success', 'Login success');
            }
        }

        return $next($request);
    }
}
