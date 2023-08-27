<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy giá trị ngôn ngữ từ session, mặc định là 'en'
        $locale = session('locale', config('app.locale'));

        // Kiểm tra nếu ngôn ngữ hợp lệ
        if (in_array($locale, config('app.locales'))) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
