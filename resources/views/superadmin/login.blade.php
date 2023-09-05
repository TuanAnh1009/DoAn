<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/dashboard/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login SuperAdmin</title>

    <!-- Custom fonts for this template-->
    <link href="/css/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="height: 100vh; display: flex; justify-content: center; align-items: center">

    <div class="container" style="display: flex; justify-content: center">

        <!-- Outer Row -->
        <div class="row justify-content-center"  style="max-width: 560px; width: 100%">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" style="display: block">
                            <div class="col-lg-6" style="width: 100%; max-width: 100%">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login SuperAdmin</h1>
                                        @if(session('notification1'))
                                            <div class="error-alert" role="alert" style="color: red">
                                                {{ session('notification1') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form class="user" method="post" action="">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
{{--                                    <hr>--}}
{{--                                    <div class="text-center">--}}
{{--                                        <a class="small" href="forgot-password.html">Forgot Password?</a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/css/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/css/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/css/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/admin/js/sb-admin-2.min.js"></script>

</body>

</html>
