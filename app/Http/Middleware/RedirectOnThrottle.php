<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class RedirectOnThrottle extends ThrottleRequests
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param int $maxAttempts
     * @param int $decayMinutes
     * @param string $prefix
     * @return mixed
     *
     * @throws \Illuminate\Http\Exceptions\ThrottleRequestsException
     */
    public function handle($request, Closure $next, $maxAttempts = 60, $decayMinutes = 1, $prefix = '')
    {
        try {
            return parent::handle($request, $next, $maxAttempts, $decayMinutes);
        } catch (ThrottleRequestsException $exception) {
            // Handle ThrottleRequestsException here
            return $this->buildResponse($exception->getHeaders(), $decayMinutes);
        }
    }

    /**
     * Build the response for the given exception.
     *
     * @param  array  $headers
     * @param  string  $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function buildResponse(array $headers, $decayMinutes)
    {
        return back()->with(['danger' => 'Слишком много попыток! Подождите пожалуйста', 'time' => $decayMinutes])->withInput();
    }
}
