<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    
    protected function redirectTo($request)
    {
        /** 
         *if (! $request->expectsJson()) {
         *   return route('login');
         *}
         */

        /**
         *if (!$request->expectsJson()) {
         *   if (Route::is('user.*')) {
         *       return route($this->user_route);
         *   } elseif (Route::is('medical_user.*')) {
         *       return route($this->medical_user_route);
         *   }
        *}
        */

        if (! $request->expectsJson()) {
            if($request->is('medical_user/*')) return route('medical_user.login');
            return route('login');
        }
    }
}
