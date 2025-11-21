<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class BuyerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('buyer')->check()) {
            return redirect('/buyer/login');
        }
        return $next($request);
    }
}