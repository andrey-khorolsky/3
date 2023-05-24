<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Statistic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if (strcasecmp(explode("/", $url)[1], "public") != 0)
            (new \App\Models\AR\Statistic)->save();
        return $next($request);
    }
}
