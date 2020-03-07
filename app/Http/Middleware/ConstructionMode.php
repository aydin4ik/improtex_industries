<?php

namespace App\Http\Middleware;

use Closure;
use TCG\Voyager\Facades\Voyager;


class ConstructionMode
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
        if(Voyager::setting('site.construction'))
        {
            return response()->view('layouts.construction');
        }
        return $next($request);
    }
}
