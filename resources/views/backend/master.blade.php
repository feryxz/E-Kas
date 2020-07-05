
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>E-Kas | @yield('title')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{ asset('dist/images/favicon.ico')}}">

        <link href="{{ asset('dist/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dist/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dist/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dist/assets/css/style.css')}}" rel="stylesheet" type="text/css">
        @yield('page_css')
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="/" class="logo">
                        <span class="text-white">E-KAS</span>
                        <i class="text-white" style="color: white!important;font-size:14px!important;">E-KAS</i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        <li class="dropdown notification-list d-none d-sm-block">
                            <form role="search" class="app-search">
                                <div class="form-group mb-0"> 
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form> 
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti-bell noti-icon"></i>
                                <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                <!-- item-->
                                <h6 class="dropdown-item-text">
                                    Notifications (258)
                                </h6>
                                <div class="slimscroll notification-item-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                        <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                                        <p class="notify-details">Your item is shipped<span class="text-muted">It is a long established fact that a reader will</span></p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                                        <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                                    </a>
                                </div>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                    View all <i class="fi-arrow-right"></i>
                                </a>
                            </div>        
                        </li>
                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ Auth::user()->avatar == 'null' ? asset('dist/images/avatar.png') : asset('dist/images/'.Auth::user()->avatar.'')}}" alt="user" class="rounded-circle">
                                    <!-- {{Auth::user()->avatar}} -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="{{route('profile')}}"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    <button class="dropdown-item text-danger" href="#"><i class="mdi mdi-power text-danger"></i> Logout</button>
                                    </form>
                                </div>                                                                    
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>                        <li class="d-none d-sm-block">
                            
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            @include('backend.sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">@yield('title')</h4>
            
                                    <div class="state-information d-none d-sm-block">
                                        @yield('button')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->

                    @yield('content')
                    
                </div> <!-- content -->
                

                @include('backend.footer')

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
            

        <!-- jQuery  -->
        <script src="{{ asset('dist/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('dist/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('dist/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{ asset('dist/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('dist/assets/js/waves.min.js')}}"></script>

        <script src="{{ asset('dist/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('dist/assets/js/app.js')}}"></script>
        @yield('page_js')
    </body>

</html>