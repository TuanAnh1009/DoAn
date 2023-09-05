<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function loginPage() {
        return view('front/account/login');
    }

    public function postLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 2,
        ];

        $remember = $request->remember;

        if (Auth::attempt($data, $remember)) {
            return redirect('');
        } else {
            return back()->with('notification1', 'ERROR: Email or Password is wrong');
        }
    }

    public function logout() {
        Auth::logout();
        return back();
    }

    public function register() {
        return view('front/account/register');
    }

    public function postRegister(Request $request) {
        $check_email = $this->userService->all()->where('email', '=', $request->email);

        if(count($check_email) > 0) {
            return back()
                ->with('notification', 'ERROR: This email has been created');
        }

        if ($request->password != $request->password_confirmation) {
            return back()
                ->with('notification', 'ERROR: Confirm password does not match');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 2,
        ];

        $this->userService->create($data);

        return redirect('account/login')
            ->with('notification', 'Register Success! Please Login.');
    }

    public function myAccount()
    {
        return view('front/account/my-account');
    }

    public function editAccount(Request $request) {
        $data = $request->all();
        $id_user = $request->get('id');
        $data['password'] = Auth::user()->password;

        $this->userService->update($data, $id_user);

        return redirect('/my-account')->with('alert', 'Saved!');
    }

    public function forgotPass()
    {
        return view('front/account/forgot-password');
    }

    public function postForgotPass(Request $request)
    {
        $data = $request->all();
        $customer = $this->userService->all()->where('email', '=' , $data['email']);
        $count_customer = count($customer);
        foreach($customer as $find => $value) {
            $customer_id = $value->id;
        };

        if($count_customer == 0) {
            return back()->with('notification', 'ERROR: email has not been created');
        } else {
            $customer = $this->userService->find($customer_id);
            $name = $customer->name;
            $mail = $customer->email;

            $token_random = Str::random(40);
            $customer->remember_token = $token_random;
            $customer->save();

            $link_reset = url('/account/update-password?email=' . $mail . '&token=' . $token_random);

            Mail::send('front/account/email', compact('name', 'link_reset'), function ($email) use ($name){
                $email->subject('Reset your password');
                $email->to('tuananh20417@gmail.com', $name);
            });
            return back()->with('notification2', 'Link reset has sent. Please check your email!');
        }
    }

    public function resetPass(Request $request)
    {
        $data = $request->all();

        if(count($data) == 0) {
            return redirect('account/forgot-password')->with('notification', 'The link has expired, please re-enter your email');;
        }

        $customer = $this->userService->all()->where('email', '=' , $data['email'])->where('remember_token', '=', $data['token']);
        $count_customer = count($customer);

        if($count_customer == 0) {
            return redirect('account/forgot-password')->with('notification', 'The link has expired, please re-enter your email');
        } else {
            return view('front/account/update-password');
        }
    }

    public function postResetPass(Request $request)
    {
        $data = $request->all();
        $customer = $this->userService->all()->where('email', '=' , $data['email'])->where('remember_token', '=', $data['token']);
        $count_customer = count($customer);

        if($count_customer > 0) {
            foreach($customer as $find => $value) {
                $customer_id = $value->id;
            }

            $customer = $this->userService->find($customer_id);
            $token_random = Str::random(40);

            if ($request->password != $request->password_confirmation) {
                return back()
                    ->with('notification', 'ERROR: Confirm password does not match');
            } else {
                unset($data['password_confirmation']);
            }

            $data['password'] = bcrypt($request->get('password'));

            $customer->password = $data['password'];
            $customer->remember_token = $token_random;

            $customer->save();

            return redirect('account/login')->with('notification', 'Password has been changed, please login');
        } else {
            return redirect('account/forgot-password')->with('notification', 'The link has expired, please re-enter your email');
        }
    }
}
