<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            return redirect()->route('login');
        }

        if (Auth::user()->role !== $role) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Access Denied: You are not a ' . $role], 403);
            }
            abort(403, 'Unauthorized access. You need to be a ' . $role);
        }

        return $next($request);
    }
}