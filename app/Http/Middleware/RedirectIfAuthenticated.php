<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        /**
         *foreach ($guards as $guard) {
         *   if (Auth::guard($guard)->check()) {
         *       return redirect(RouteServiceProvider::HOME);
         *   }
         *   if($guard == "medical_user" && Auth::guard($guard)->check()) {   //追記
         *       return redirect('medical_user/home');                        //追記
         *   }  
         *}
         */

        foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            if($guard == 'medical_user'){
                return redirect(RouteServiceProvider::MEDICAL_USER_HOME);
            }

            return redirect(RouteServiceProvider::FAMILY_USER_HOME);
        }
    }

        return $next($request);
    }
}
