@extends('front/layout/main')

@section('style')
    <link href="/css/front/pages.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="page">
        <div class="content-page">
            <div class="container-account-page">
                <div class="page-title">
                    Forgot Password
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

                <div class="login-account">
                    <form class="form-login" method="POST">
                        <label for="email">Pleace enter Email Address<em>*</em></label>
                        <input type="text" id="email" placeholder="Enter Email Address" name="email" required="">
                        <button class="button-login" type="submit">Submit</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
