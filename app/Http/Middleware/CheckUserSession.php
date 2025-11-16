<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserSession
{
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('login')) {
            // user value cannot be found in session
            session()->put('typeError', 'warning');
            return redirect()->route('admin.login')->with('message', 'Silahkan Login Terlebih Dahulu');;
        }
        return $next($request);
    }
}
