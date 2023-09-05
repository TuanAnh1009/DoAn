<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email Address is not blank',
            'password.required' => 'Password is not blank'
        ]);

        if($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        } else {
            $data = [
                'email' => $request->email,
                'password' => $request->password,
                'level' => 2,
            ];

            $remember = $request->remember;
            $user = Auth::attempt($data, $remember);
            if($user) {
                return response()->json([
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'error' => ['Email or Password is wrong']
                ]);
            }
        }
    }
}
