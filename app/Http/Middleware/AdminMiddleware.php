<?php

namespace Oshaman\Publication\Http\Middleware;

use Closure;
use Auth;
use Gate;

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
        }
        
        if (Auth::guard($guard)->guest()) {
                return redirect()->guest('login');
        }
        
        if (Gate::denies('VIEW_ADMIN')) {
            abort(404);
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
