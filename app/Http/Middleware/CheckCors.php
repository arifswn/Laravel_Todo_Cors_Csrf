<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only allow GET requests
        $allowedMethods = ['GET', 'POST', 'PUT'];

        // Check the request method
        $method = $request->method();

        // Check if the request method is allowed
        $checkMethod = in_array($method, $allowedMethods);

        // Continue if the request method is allowed
        if ($checkMethod) {
            return $next($request);
        }

        // Return a 403 Forbidden response if the origin or method is not allowed
        return response()->json(['message' => 'Forbidden'], 403);
    }
}
