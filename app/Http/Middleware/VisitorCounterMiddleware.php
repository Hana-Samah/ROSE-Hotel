<?php
namespace App\Http\Middleware;

use App\Models\VisitorCounter;
use Closure;

class VisitorCounterMiddleware
{
    public function handle($request, Closure $next)
    {
        VisitorCounter::incrementCounter();
        return $next($request);
    }
}