<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginRedirect
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
        Log::info('check');
        if (Auth::user()) {
            $code = Auth::user()->code;
            Log::info('Code '.$code);
            if($code != '0' && !empty($code)) {
                Log::info('customer');
                // User is logged in, redirect to intended or custom location
                $intended = url()->intended(route('home')); // Replace 'home' with your desired route

                return new RedirectResponse($intended);
            }
        }

        return $next($request);
    }
}
