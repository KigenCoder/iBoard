<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotOrganizationEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        if (is_null($request->user())) {
            return redirect('login');
        }
        //If not System admin redirect to Login
        if (!$request->user()->isOrganizationEditor()) {

            return redirect('login');
        }

        return $next($request);
    }
}
