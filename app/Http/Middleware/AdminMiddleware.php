<?php

namespace Oshaman\Publication\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = false)
    {
        if (!$this->checkIp($request->ip())) {
            abort(404);
        } else {
            if (Auth::guard($guard)->guest()) {
                return redirect()->guest('login');
            }
        }
        
        
        
        return $next($request);
    }
    /**
     * Handle an incoming IP.
     *
     * @param  IP
     * @return mixed
     */
    protected function checkIp($ip)
    {
        foreach (config('trusted_moderators') as $trusted) {
            if ($ip === $trusted) {
                return true;
            }
        }
        return false;
    }
}
