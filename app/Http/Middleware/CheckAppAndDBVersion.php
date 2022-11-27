<?php

namespace App\Http\Middleware;

use CisConfig\Facades\Config;
use Closure;
use Illuminate\Http\Request;

class CheckAppAndDBVersion
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
        if(config("app.version") != Config::get('db_version')) {
            return abort("501","DB and App version conflict");
        }
        return $next($request);
    }
}
