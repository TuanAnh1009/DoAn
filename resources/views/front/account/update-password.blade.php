@extends('front/layout/main')

@section('style')
    <link href="/css/front/pages.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="page">
        <div class="content-page">
            <div class="container-account-page">
                <div class="page-title">
                    Reset Password
                </div>

                @if(session('notification'))
                    <div class="error-alert" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif
                @if(session('notification2'))
                    <div class="error-alert" role="alert" style="color: #fff">
                        {{ session('notification2') }}
                    </div>
                @endif

                @php
                    $email = $_GET['email'];
                    $token = $_GET['token'];
                @endphp

                <div class="login-account">
                    <form class="form-login" action="/account/update-password" method="POST">
                        <label for="email">New Password<em>*</em></label>
                        <input type="text" id="password" value="" placeholder="Enter New Password"
                               name="password" required="">
                        <label for="email">Confirm Password<em>*</em></label>
                        <input type="text" id="password_confirmation" placeholder="Enter Confirm Password"
                               name="password_confirmation" value="" required="">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <button class="button-login" type="submit">Submit</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
