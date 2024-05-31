<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SQLInjectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get User's input data: 
        $input = $request->all();

        // Clearing user's input from any character: 
        array_walk_recursive($input, function(&$value) {
            
            // Removing HTML tags
            $value = strip_tags($value); 
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); 

            // Removing SQL injection characters
            $value = preg_replace('/[\'";]/', '', $value); 
        });

        // Replacing original content with cleaned input: 
        $request->merge($input);


        return $next($request);
    }
}
