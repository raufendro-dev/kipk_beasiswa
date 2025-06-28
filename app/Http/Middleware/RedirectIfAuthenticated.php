<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();

            return match ($user->role) {
                'admin' => redirect('/dashboard-admin'),
                'mahasiswa' => redirect('/dashboard-mahasiswa'),
                default => redirect('/dashboard'),
            };
        }

        return $next($request);
    }
}
