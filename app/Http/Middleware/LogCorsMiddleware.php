<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Log;
use Symfony\Component\HttpFoundation\Response;

class LogCorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->headers->has('origin')) {
            //    output log
            Log::info('Cors Request Detected', [
                'Origin' => $request->headers->get('origin'),
                'Method' => $request->method(),
                'URL' => $request->fullUrl(),
                'Allowed Origins' => config('cors.allowed_origins'),
                'Allowed Methods' => config('cors.allowed_methods'),
            ]);
        }
        $response = $next($request);
        return $response;
    }
}
