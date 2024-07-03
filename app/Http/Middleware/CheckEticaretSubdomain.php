<?php

namespace app\Http\Middleware;

use Closure;

class CheckEticaretSubdomain
{
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();
        $subdomain = explode('.', $host)[0]; // Alt alanı al
         if ($subdomain === 'eticaret') {
            return $next($request);
        }

        abort(404); // or redirect to the appropriate page
    }
}
