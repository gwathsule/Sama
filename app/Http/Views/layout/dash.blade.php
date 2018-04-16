<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | SAMA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('/assets/dash/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- vendor/bootstrap/css/bootstrap.min.css -->
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('/assets/dash/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('/assets/dash/css/fontastic.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{asset('/assets/dash/css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet"
          href="{{asset('/assets/dash/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('/assets/dash/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('/assets/dash/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('/assets/dash/img/favicon.ico')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center" style="height: 67px">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center">
                Projeto SAMA
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo">
                <img class="brand-small text-center" src="{{asset('/assets/dash/img/icone_branco.png')}}" style="height: 30px; width: 30px; top: 10px" alt="">
            </div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">
                @if(auth::user()->tipo == 'Admin')
                    @include('panel::layout.menu-admin')
                @elseif(auth::user()->tipo == 'Doador')
                    @include('panel::layout.menu-admin')
                @elseif(auth::user()->tipo == 'Entidade')
                    @include('panel::layout.menu-entidade')
                @elseif(auth::user()->tipo == 'Rotary')
                    @include('panel::layout.menu-rotary')
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="page">
    <!-- navbar-->
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn">
                            <i class="fa fa-exchange"> </i>
                            </a><a href="{{url('/')}}" class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block">
                                <strong class="text-primary">PAINEL | {{strtoupper(Auth::user()->tipo)}}</strong>
                            </div>
                        </a>
                    </div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <li class="nav-item"><a href="{{url('/logout')}}" class="nav-link logout">Logout<i
                                        class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="mt-30px mb-30px">
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </section>
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p><a href="https://www.linkedin.com/in/rafael-dos-santos-gomes-832358136/">Rafael</a> | <a href="#">Cezar</a> | 2018</p>
                </div>
                <div class="col-sm-6 text-right">
                    <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
                    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Javascript files-->
<script src="{{asset('/assets/dash/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/assets/dash/vendor/popper.js/umd/popper.min.js')}}"></script>
<script src="{{asset('/assets/dash/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/dash/js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
<script src="{{asset('/assets/dash/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('/assets/dash/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('/assets/dash/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/assets/dash/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('/assets/dash/js/charts-home.js')}}"></script>
<!-- Main File-->
<script src="{{asset('/assets/dash/js/front.js')}}"></script>
<script>
    $(document).ready(function() {
        document.getElementById("btn_modal_errors").click();
    });
</script>
<script>
    $(document).ready(function() {
        document.getElementById("btn_modal_sucess").click();
    });
</script>
</body>
</html>