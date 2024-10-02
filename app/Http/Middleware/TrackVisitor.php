<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // تحقق من وجود ملف تعريف الارتباط
        if (!$request->hasCookie('visitor_id')) {
            // احصل على عنوان IP
            $ip = $request->ip();
            
            // استخدم API للحصول على الموقع واللغة (أو من البيانات المتاحة)
            $location = ''; // تنفيذ API للحصول على الموقع
            $language = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
    
            // قم بتسجيل الزائر في قاعدة البيانات
            $visitor = Visitor::create([
                'ip_address' => $ip,
                'location' => $location,
                'language' => $language,
            ]);
    
            // إنشاء ملف تعريف ارتباط يحتوي على معرف الزائر
            $cookie = cookie('visitor_id', $visitor->id, 60*24); // يستمر ليوم واحد
            return $next($request)->cookie($cookie);
        }
    
        return $next($request);
    }
    

}
