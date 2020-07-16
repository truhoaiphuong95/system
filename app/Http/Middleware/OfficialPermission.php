<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OfficialPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,  $guard = 'staff')
    {
        if (Auth::guard($guard)->user()->level < 2) {
            return redirect()->back()->withErrors('Bạn không có quyền truy cập, hãy liên hệ với cấp quản lý.');
        }

        return $next($request);
    }
}
