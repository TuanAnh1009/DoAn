<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getLogin() {
        return view("admin/login");
    }

    public function postLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 1,
        ];

        $remember = $request->remember;

        if (Auth::attempt($data, $remember)) {
            return redirect('admin/dashboard');
        } else {
            return back()->with('notification1', 'ERROR: Email or Password is wrong');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('admin/login');
    }

    public function getLoginSAdmin() {
        return view('superadmin/login');
    }

    public function postLoginSAdmin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0,
        ];

        $remember = $request->remember;

        if (Auth::attempt($data, $remember)) {
            return redirect('sadmin/dashboard');
        } else {
            return back()->with('notification1', 'ERROR: Email or Password is wrong');
        }
    }

    public function logoutSAdmin() {
        Auth::logout();
        return redirect('sadmin/login');
    }
}
