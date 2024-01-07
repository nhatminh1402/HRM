<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
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
                ->route('login.index')
                ->with('error', 'VUI LÒNG ĐĂNG NHẬP ĐỂ TIẾP TỤC TRUY CẬP!');
        }

        $user = Auth::user();
        if ($user->isAdmin) {
            toastr()->error('TRANH DÀNH RIÊNG CHO NHÂN VIÊN!');
            return redirect()->back();
        }

        return $next($request);
    }
}
