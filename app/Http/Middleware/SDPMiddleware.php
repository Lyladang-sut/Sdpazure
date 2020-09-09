<?php

namespace App\Http\Middleware;

use Closure;

class SDPMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && ($request->user()->role != 'Administrator' && $request->user()->role != 'SDP'))
        {
            return redirect()->route('404');
        }
        return $next($request);
    }
}
