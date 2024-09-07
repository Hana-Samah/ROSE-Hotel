<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // احصل على عنوان الـ IP الخاص بالزائر
        $ip = $request->ip();

        // تحقق مما إذا كان عنوان الـ IP موجودًا في الجدول
        if (!Visit::where('ip_address', $ip)->exists()) {
            // قم بإضافة السجل في حال لم يكن موجودًا
            Visit::create([
                'ip_address' => $ip,
            ]);
        }

        return $next($request);
    }
}
