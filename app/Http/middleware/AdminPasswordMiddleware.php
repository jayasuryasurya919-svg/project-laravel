<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPasswordMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('admin_password_ok') === true) {
            return $next($request);
        }

        return redirect()->route('admin.password.show');
    }
}
