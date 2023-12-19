<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezG1Nz0Dx5X8IbL7e5fFY9gyh6NHI5XyoFjjBhFiMquLZhPUn/6Z/hRTt8+pR6L4" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom-styles.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->


        
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Navbar content -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('admin.dashboard') }}" class="d-block">Admin</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Manage Orders -->
        <li class="nav-item">
            <a href="{{ route('admin.manageOrders') }}" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>Manage Orders</p>
            </a>
        </li>

        <!-- Manage Users -->
        <li class="nav-item">
            <a href="{{ route('admin.manageUsers') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Manage Users</p>
            </a>
        </li>

        <!-- Add Product -->
        <li class="nav-item">
            <a href="{{ route('admin.addProduct') }}" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                <p>Add Product</p>
            </a>
        </li>

        <!-- Remove Product -->
        <li class="nav-item">
            <a href="{{ route('admin.removeProduct', ['product' => 1]) }}" class="nav-link">
                <i class="nav-icon fas fa-minus"></i>
                <p>Remove Product</p>
            </a>
        </li>

        <!-- Store Product -->
        <li class="nav-item">
            <a href="{{ route('admin.storeProductView') }}" class="nav-link">
                <i class="nav-icon fas fa-store"></i>
                <p>Store Product</p>
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->

        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Admin Dashboard
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Additional footer content -->
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Additional control sidebar content -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>
