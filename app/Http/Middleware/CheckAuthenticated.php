<?php

namespace App\Http\Middleware;

use Closure;
use Aacotroneo\Saml2\Facades\Saml2Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CheckAuthenticated
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
        if (Auth::guest())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return Saml2Auth::login(URL::full());
                //return redirect()->guest('auth/login');
            }
        }

        return $next($request);
    }
}
