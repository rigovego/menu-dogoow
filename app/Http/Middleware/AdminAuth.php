<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('admin_authenticated')) {
            return redirect()->route('admin.login')
                ->with('error', 'Debes ingresar la contraseña para acceder al panel.');
        }

        return $next($request);
    }
}