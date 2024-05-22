<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ThrottleAttempts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $maxAttempts = 3, $decayMinutes = 1)
    {
        if ($this->isRateLimited($request, $maxAttempts, $decayMinutes)) {
            return Redirect::back()->with('error', 'Too many tryings, please try again later.');
        }

        return $next($request);
    }

    /**
     * Determine if the request is rate limited.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $maxAttempts
     * @param  int  $decayMinutes
     * @return bool
     */
    protected function isRateLimited(Request $request, $maxAttempts, $decayMinutes)
    {
        if ($request->user()) {
            return $request->user()
                ->attempts($request->route()->uri(), $maxAttempts)
                ->exceeds($decayMinutes);
        }

        return false;
    }
}
