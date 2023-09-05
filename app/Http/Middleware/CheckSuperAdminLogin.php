<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //chua dang nhap: chuyen huong den trang login
        if (Auth::guest()) {
            return redirect()->guest('sadmin/login');
        }

        //dang nhap sai level: dang xuat va dang nhap lai
        if (Auth::user()->level != 0) {
            Auth::logout();
            return redirect()->guest('sadmin/login');
        }
        return $next($request);
    }
}
