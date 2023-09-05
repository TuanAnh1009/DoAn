@extends('front/layout/main')

@section('style')
    <link href="/css/front/pages.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="page">
        <div class="content-page">
            <div class="container-account-page">
                <div class="page-title">
                    Register
                </div>

                @if(session('notification'))
                    <div class="error-alert" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif

                <div class="register-account">
                    <form action="" class="form-register" method="POST">
                        <label for="name">Name<em>*</em></label>
                        <input type="text" id="name" placeholder="Enter Name" name="name" required="">
                        <label for="email">Email Address<em>*</em></label>
                        <input type="email" id="email" placeholder="Enter Email Address" name="email" required="">
                        <label for="pass">Password<em>*</em></label>
                        <input type="password" id="pass" placeholder="Enter Password" name="password" required="">
                        <label for="con-pass">Confirm Password<em>*</em></label>
                        <input type="password" id="con-pass" placeholder="Enter Confirm Password" name="password_confirmation" required="">
                        <button class="button-register" type="submit">Register</button>
                        @csrf
                    </form>
                    <div class="login-account">
                        <a href="/account/login" class="login">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $("#account").off();
            $("#account").on('click', function () {
                    window.location.replace('http://do-an/account/login');
            });
        });
    </script>
@endsection
