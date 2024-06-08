<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ViewUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->is_viewer == 1 && ($request->method() == "POST" || $request->method() == "PUT")){

            // Allow only to Logout: 
            if($request->route()->getName() === 'logout'){
                return $next($request);
            }

            // Message to be displayed when a viewer account try to edit data: 
            $notification = array(
                'message' => "You don't have permission!", 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        return $next($request);
    }
}
