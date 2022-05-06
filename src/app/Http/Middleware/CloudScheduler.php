<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CloudScheduler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->header('schedule-key') == env('SCHEDULE_KEY'))
            return $next($request);
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}
