<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;

class RateRequestMiddleware
{
    /**
     * Middleware to rate Limit Request per minutes for any user: 
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = 'global_rate_limit'.$request->ip();
        
        // Number of Maximum Requests: 
        $maxAttempts = 60;

        // Specifying Time to send requests: 
        $limiter = RateLimiter::for($key, function () use ($maxAttempts) {
            return Limit::perMinute($maxAttempts);
        });

        if ($limiter->tooManyAttempts($key, $maxAttempts)) {
            $headers = [
                'X-RateLimit-Limit' => $maxAttempts,
                'X-RateLimit-Remaining' => $limiter->retriesLeft($key, $maxAttempts),
            ];

            return response('Too Many Requests', 429)->withHeaders($headers);
        }
        $limiter->hit($key);

        return $next($request);
    }
}
