<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Support\Facades\View;

class Localization
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
        if (session()->has('lang')) {
            App::setLocale(session()->get('lang'));
        }
        View::share('lang', App::getLocale());
        return $next($request);
    }
}
