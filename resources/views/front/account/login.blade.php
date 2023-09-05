@extends('front/layout/main')

@section('style')
    <link href="/css/front/pages.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="page">
        <div class="content-page">
            <div class="container-account-page">
                <div class="page-title">
                    Login
                </div>

                @if(session('notification1'))
                    <div class="error-alert" role="alert">
                        {{ session('notification1') }}
                    </div>
                @endif

                @if(session('notification'))
                    <div class="error-alert" role="alert" style="color: #fff">
                        {{ session('notification') }}
                    </div>
                @endif

                <div class="login-account">
                    <form class="form-login" method="POST">
                        <label for="email">Email Address<em>*</em></label>
                        <input type="text" id="email" placeholder="Enter Email Address" name="email" required="">
                        <label for="pass">Password<em>*</em></label>
                        <input type="password" id="pass" placeholder="Enter Password" name="password" required="">
                        <div class="box">
                            <label for="save-pass" class="save-pass">
                                Save Password
                                <input type="checkbox" id="save-pass" name="remember">
                            </label>
                            <a href="/account/forgot-password" class="forgot-account">Forgot your account ?</a>
                        </div>
                        <button class="button-login" type="submit">Login</button>
                        @csrf
                    </form>
                    <div class="register-account">
                        <a href="/account/register" class="register">Or Register</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $("#account").off();
        });
    </script>
@endsection

