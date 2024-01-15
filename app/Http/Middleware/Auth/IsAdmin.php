<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Nếu chưa đăng nhập
        if (!Auth::check()) {
            return redirect()
                ->route('admin.login.index')
                ->with('error', 'VUI LÒNG ĐĂNG NHẬP ĐỂ TRUY CẬP TRANG QUẢN TRỊ!');
        }
        return $next($request);
    }
}
