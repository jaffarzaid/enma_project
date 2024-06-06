<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CoursesSectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->courses == 0){
            // Force logout: 
            Auth::guard('web')->logout();

            // Destroying session: 
            $request->session()->invalidate();

            // Regenerate Token: 
            $request->session()->regenerateToken();

            $notification = array(
                'message' => 'Access Denied',
                'alert-type' => 'error',
            );

            return redirect()->route('login')->with($notification);
        }
        return $next($request);
    }
}
