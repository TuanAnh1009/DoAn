<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="/css/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/css/admin/css/custom.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" type="text/css">
    @yield('style')

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        @if(Auth::user()->level == 1)
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/admin/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Manage
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/brand" style="padding: 0.5rem 1rem">
                <span class="{{ (request()->segment(2) == 'brand' ? 'mm-active' : '') }}">Brand</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/collections" style="padding: 0.5rem 1rem">
                <span class="{{ (request()->segment(2) == 'collections' ? 'mm-active' : '') }}">Collections</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/product" style="padding: 0.5rem 1rem">
                <span class="{{ (request()->segment(2) == 'product' ? 'mm-active' : '') }}">Product</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/order" style="padding: 0.5rem 1rem">
                <span class="{{ (request()->segment(2) == 'order' ? 'mm-active' : '') }}">Order</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/customer" style="padding: 0.5rem 1rem">
                <span class="{{ (request()->segment(2) == 'customer' ? 'mm-active' : '') }}">Customer</span></a>
        </li>
        @endif

{{--        SuperAdmin--}}
        @if(Auth::user()->level == 0)
        <li class="nav-item active">
            <a class="nav-link" href="/sadmin/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

            <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Manage
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/sadmin/admin" style="padding: 0.5rem 1rem">
                <span class="{{ (request()->segment(2) == 'admin' ? 'mm-active' : '') }}">Admin</span></a>
        </li>
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                @if (Auth::user()->level == 0)
                                    SuperAdmin
                                @elseif(Auth::user()->level == 1)
                                    Admin
                                @endif
                                {{ Auth::user()->name }}
                            </span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            @if(Auth::user()->level == 1)
                            <a class="dropdown-item" href="/admin/my-account">
                                My account
                            </a>
                            <a class="dropdown-item" href="/admin/logout">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            @else
                                <a class="dropdown-item" href="/sadmin/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            @endif

                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            @yield('content')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Bootstrap core JavaScript-->
<script src="/css/admin/vendor/jquery/jquery.min.js"></script>
<script src="/css/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/css/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/js/admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/css/admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/admin/js/demo/chart-area-demo.js"></script>
<script src="/js/admin/js/demo/chart-pie-demo.js"></script>

<script src="/js/admin/jquery-3.2.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/js/admin/main.js"></script>
<script type="text/javascript" src="/js/admin//my_script.js"></script>
</body>

</html>
