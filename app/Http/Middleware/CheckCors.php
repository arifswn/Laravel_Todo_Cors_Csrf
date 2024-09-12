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
        $allowedMethods = ['GET', 'POST'];
        // check method
        $method = $request->method();

        // check log
        $checkMethod = in_array($method, $allowedMethods);

        // check Method
        if ($checkMethod) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
