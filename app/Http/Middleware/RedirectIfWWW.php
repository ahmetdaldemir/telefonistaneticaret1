<?php
namespace app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfWWW
{
    public function handle(Request $request, Closure $next)
    {
        if (strpos($request->header('host'), 'www.') === 0) {
            $request->headers->set('host', substr($request->header('host'), 4));
            return redirect()->to($request->getRequestUri(), 301);
        }

        return $next($request);
    }
}
