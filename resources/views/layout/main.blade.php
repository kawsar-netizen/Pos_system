
@extends('layout.primary')
@section('page_body')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home.dashboard')}}">
                    <img src="{{asset('assets/img/sizar.jpg')}}"id ="img">
                <div class="sidebar-brand-text mx-3">pos system</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @if($main_menu == 'Dashboard') active @endif">
                <a class="nav-link" href="{{route('home.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item @if($main_menu == 'Users') active @endif">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="user" class="collapse @if($main_menu ==  'Users') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @if($sub_menu == 'Groups') active @endif" href="{{url('groups')}}">Groups</a>
                        <a class="collapse-item @if($sub_menu == 'Users') active @endif" href="{{url('users')}}">Users</a>
                    </div>
                </div>
            </li>
            <li class="nav-item @if($main_menu == 'Products') active @endif">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products"
                    aria-expanded="true" aria-controls="products">
                    <i class="fas fa-sitemap"></i>
                    <span>Products</span>
                </a>
                <div id="products" class="collapse @if($main_menu == 'Products') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @if($sub_menu == 'Categories') active @endif" href="{{route('categories.index')}}">Categories</a>
                        <a class="collapse-item @if($sub_menu == 'Products') active @endif" href="{{route('Products.index')}}">Products</a>
                        <a class="collapse-item @if($sub_menu == 'Stocks') active @endif" href="{{route('stocks.index')}}">Stocks</a>
                    </div>
                </div>
            </li>

            <li class="nav-item @if( $main_menu == 'Reports' ) active @endif">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reports"
                    aria-expanded="true" aria-controls="reports">
                    <i class="fas fa-chart-bar"></i>
                    <span>Reports</span>
                </a>
                <div id="reports" class="collapse @if($main_menu == 'Reports') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @if($sub_menu == 'Days') active @endif" href="{{route('reports.days')}}">Day Reports</a>
                        <a class="collapse-item @if($sub_menu == 'Sales') active @endif" href="{{route('reports.sales')}}">Sales</a>
                        <a class="collapse-item @if($sub_menu == 'Purchases') active @endif" href="{{route('reports.purchases')}}">Purchases</a>
                        <a class="collapse-item @if($sub_menu == 'Payments') active @endif" href="{{route('reports.payments')}}">Payments</a>
                        <a class="collapse-item @if($sub_menu == 'Receipts') active @endif" href="{{route('reports.receipts')}}">Receipts</a>
                    </div>
                </div>
            </li>


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

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('assets/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a> 
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                    {{session('message')}}
                    </div>
                @endif
                    @yield('main_content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
  @stop