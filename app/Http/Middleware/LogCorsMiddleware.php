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
        // reset log file
        // File::put(storage_path('logs/laravel.log'), '');

        // Cek apakah request termasuk CORS
        if ($request->headers->has('Origin')) {
            // Log detail request CORS
            Log::info('CORS Request Detected:', [
                'Origin' => $request->headers->get('Origin'),
                'Method' => $request->getMethod(),
                'URL' => $request->fullUrl(),
                'Allowed Methods' => config('cors.allowed_methods'),
                'Allowed Origins' => config('cors.allowed_origins'),
            ]);
        }
        // Reset log after processing request
        $response = $next($request);

        // Return response
        return $response;
    }
}
