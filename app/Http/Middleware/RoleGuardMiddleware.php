<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleGuardMiddleware
{
    public function handle($request, Closure $next, $guard, $role)
    {
        // Belirli guard'ı kullanarak oturum açılmış mı kontrolü
        if (Auth::guard($guard)->check()) {
            // Kullanıcının belirli bir role sahip olup olmadığını kontrol et
            if (Auth::guard($guard)->user()->hasRole($role)) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized');
    }
}
