<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Dashboard | Sokoni Kwetu</title>

    <!-- Add Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Add FontAwesome CSS from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Add AdminLTE CSS and plugins -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Include your custom CSS styles from the dist folder -->
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

    <!-- Add Chart.js from CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Add DataTables CSS from CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    <!-- Add DataTables JS from CDN -->
    <script defer type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Information -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User Panel -->
                        <div class="dropdown-item">
                            <div class="user-panel">
                                <div class="info">
                                    <p>{{ auth()->user()->name }}</p>
                                    <a href="#"><i class="fas fa-circle text-success"></i> Online</a>
                                </div>
                            </div>
                        </div>
                        <!-- Logout -->
                        <div class="dropdown-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <span class="brand-text font-weight-light">Sokoni Kwetu</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- User Information -->
                    <div class="info">
                        <p class="d-block">{{ auth()->user()->name }}</p>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Browse Products -->
                        <li class="nav-item">
                            <a href="{{ route('products.browse') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>Browse Products</p>
                            </a>
                        </li>
                        <!-- Search Products -->
                        <li class="nav-item">
                            <a href="{{ route('products.search') }}" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p>Search Products</p>
                            </a>
                        </li>
                        <!-- View Cart -->
                        <li class="nav-item">
                            <a href="{{ route('cart.view') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>View Cart</p>
                            </a>
                        </li>
                        <!-- View Order History -->
                        <li class="nav-item">
                            <a href="{{ route('orders.history') }}" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>View Order History</p>
                            </a>
                        </li>
                        <!-- Edit Profile -->
                        <li class="nav-item">
                            <a href="{{ route('profile.edit') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-edit"></i>
                                <p>Edit Profile</p>
                            </a>
                        </li> 
                        <!-- Payment Methods Dropdown -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-credit-card"></i>
                                <p>
                                    Payment Methods
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- M-Pesa -->
                                <li class="nav-item">
                                    <a href="{{ route('payment.mpesa') }}" class="nav-link">
                                        <i class="nav-icon fas fa-mobile"></i>
                                        <p>M-Pesa</p>
                                    </a>
                                </li>
                                <!-- Card Payment -->
                                <li class="nav-item">
                                    <a href="{{ route('payment.card') }}" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card"></i>
                                        <p>Card Payment</p>
                                    </a>
                                </li>
                                <!-- Bank Transfer -->
                                <li class="nav-item">
                                    <a href="{{ route('payment.bank') }}" class="nav-link">
                                        <i class="nav-icon fas fa-university"></i>
                                        <p>Bank Transfer</p>
                                    </a>
                                </li>
                                <!-- Tigo Pesa -->
                                <li class="nav-item">
                                    <a href="{{ route('payment.tigo') }}" class="nav-link">
                                        <i class="nav-icon fas fa-mobile"></i>
                                        <p>Tigo Pesa</p>
                                    </a>
                                </li>
                                <!-- Airtel Money -->
                                <li class="nav-item">
                                    <a href="{{ route('payment.airtel') }}" class="nav-link">
                                        <i class="nav-icon fas fa-mobile"></i>
                                        <p>Airtel Money</p>
                                    </a>
                                </li>
                                <!-- Cash on Delivery -->
                                <li class="nav-item">
                                    <a href="{{ route('payment.cod') }}" class="nav-link">
                                        <i class="nav-icon fas fa-money-bill-alt"></i>
                                        <p>Cash on Delivery</p>
                                    </a>
                                </li>
                                <!-- PesaPal -->
                                <li class="nav-item">
                                    <a href="{{ route('payment.pesapal') }}" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card"></i>
                                        <p>PesaPal</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Shipping and Delivery -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shipping-fast"></i>
                                <p>
                                    Shipping and Delivery
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- Delivery Timeframes -->
                                <li class="nav-item">
                                    <a href="{{ route('shipping.timeframes') }}" class="nav-link">
                                        <i class="nav-icon fas fa-clock"></i>
                                        <p>Delivery Timeframes</p>
                                    </a>
                                </li>
                                <!-- Delivery Options -->
                                <li class="nav-item">
                                    <a href="{{ route('shipping.options') }}" class="nav-link">
                                        <i class="nav-icon fas fa-truck"></i>
                                        <p>Delivery Options</p>
                                    </a>
                                </li>
                                <!-- Shipping Costs -->
                                <li class="nav-item">
                                    <a href="{{ route('shipping.costs') }}" class="nav-link">
                                        <i class="nav-icon fas fa-dollar-sign"></i>
                                        <p>Shipping Costs</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Account Settings -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Account Settings</p>
                            </a>
                        </li>
                        <!-- Promotions and Discounts -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Promotions and Discounts</p>
                            </a>
                        </li>
                        <!-- Logout -->
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                        <!-- Logout Form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </nav>
                <!-- /Sidebar Menu -->
            </div>
        </aside>
        <!-- /Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content') 
        </div>
        <!-- /Content Wrapper -->

    </div>

   <!-- Bootstrap 4 -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

   <!-- AdminLTE App -->
   <script src="{{ asset('dist/js/adminlte.min.js') }}" defer></script>

   <!-- Include Treeview library after jQuery -->
   <script src="{{ asset('plugins/treeview/treeview.js') }}" defer></script>

   <!-- Lazy Load Custom Scripts -->
   <script defer>
       document.addEventListener('DOMContentLoaded', function () {
        
       });
   </script>
</body>

</html>
