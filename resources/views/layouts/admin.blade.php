<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('themes/ample-admin-lite-master/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('themes/ample-admin-lite-master/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('themes/ample-admin-lite-master/plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('themes/ample-admin-lite-master/plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('themes/ample-admin-lite-master/plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/ample-admin-lite-master/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('themes/ample-admin-lite-master/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('themes/ample-admin-lite-master/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('themes/ample-admin-lite-master/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <!-- my style CSS -->
    <link href="{{ asset('themes/ample-admin-lite-master/css/mystyle.css') }}" id="theme" rel="stylesheet">
</head>
<body>
<div id="app">

    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <!-- /Logo -->
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                    <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                </li>
                <li>
                    <a class="profile-pic" href="#">
                        <b class="hidden-xs">Welcome {{ Auth::user()->name }}</b>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
            </div>
            <ul class="nav" id="side-menu">

                <li style="padding: 70px 0 0;">
                    <a href="{{ route('home') }}" class="waves-effect @if($menu === 'home') active @endif">
                        <i class="fa fa-home fa-fw" aria-hidden="true"></i>Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('companies.list') }}" class="waves-effect @if($menu === 'companies') active @endif">
                        <i class="fa  fa-building fa-fw" aria-hidden="true"></i>Companies
                    </a>
                </li>
                <li>
                    <a href="{{ route('employees.list') }}" class="waves-effect @if($menu === 'employees') active @endif">
                        <i class="fa fa-users fa-fw" aria-hidden="true"></i>Employees
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->


    <div id="page-wrapper">
        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2019 &copy; Development by Jeremy Reyes B. </footer>
    </div>

</div>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('themes/ample-admin-lite-master/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('themes/ample-admin-lite-master/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!--slimscroll JavaScript -->
<script src="{{ asset('themes/ample-admin-lite-master/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('themes/ample-admin-lite-master/js/waves.js') }}"></script>
<!--Counter js -->
<script src="{{ asset('themes/ample-admin-lite-master/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
<script src="{{ asset('themes/ample-admin-lite-master/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
</body>
</html>
