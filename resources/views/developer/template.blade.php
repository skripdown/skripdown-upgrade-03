<!DOCTYPE html>
<html lang="{{env('APP_LANG')}}" dir="{{env('APP_DIR')}}">
    <head>
        <title>@yield('title')</title>
        <meta charset="{{env('APP_CHARSET')}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="{{env('APP_VIEWPORT')}}">
        <meta name="description" content="{{env('APP_DESCRIPTION')}}">
        <meta name="author" content="{{env('APP_AUTHOR')}}">
        <link rel="icon" type="image/png" href="{{asset(env('ICON_PATH'))}}">
        <link rel="stylesheet" href="{{asset(env('LIB_PATH').'extra/c3/c3.min.css')}}">
        <link rel="stylesheet" href="{{asset(env('LIB_PATH').'extra/jvector/jquery-jvectormap-2.0.2.css')}}">
        <link rel="stylesheet" href="{{asset(env('LIB_PATH').'extra/prism/prism.css')}}">
        <link rel="stylesheet" href="{{asset(env('LIB_PATH').'extra/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset(env('CSS_PATH').'style.min.css')}}">
        @yield('style-head')
        @yield('script-head')
        <script src="{{asset(env('LIB_PATH').'extra/html5shiv/html5shiv.js')}}"></script>
        <script src="{{asset(env('LIB_PATH').'extra/respond/respond.js')}}"></script>
    </head>
    <body>
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div id="main-wrapper"  data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
            <header class="topbar" data-navbarbg="skin6">
                <nav class="navbar top-navbar navbar-expand-md">
                    <div class="navbar-header" data-logobg="skin6">
                        <a href="javascript:void(0)" class="nav-toggler waves-effect waves-light d-block d-md-none">
                            <i class="ti-menu ti-close"></i>
                        </a>
                        <div class="navbar-brand">
                            <a href="@yield('page_focus')">
                                <b class="logo-icon">
                                    <img src="{{asset(env('ICON_PATH'))}}" alt="homepage" class="dark-logo" style="width: 5.5em;margin-top: 1em;margin-left: 1em">
                                    <img src="{{asset(env('ICON_PATH'))}}" alt="homepage" class="light-logo" style="width: 5.5em;margin-top: 1em;margin-left: 1em">
                                </b>
                                <span class="logo-text" >
                        </span>
                            </a>
                        </div>
                        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        </ul>
                        <ul class="navbar-nav float-right">
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="ml-2 d-none d-lg-inline-block">
                                    <span class="text-dark">
                                        Profil
                                        <i data-feather="chevron-down" class="svg-icon"></i>
                                    </span>
                                </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                    @yield('header-button')
                                    <form action="{{route('logout')}}" method="post" class="dropdown-item">
                                        @csrf
                                        <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                        <input type="submit" value="Keluar" class="btn">
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="left-sidebar" data-sidebarbg="skin6">
                <div class="scroll-sidebar" data-sidebarbg="skin6">
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="sidebar-item">
                                <a class="sidebar-link sidebar-link" href="{{url('/dashboard')}}" aria-expanded="false">
                                    <i data-feather="home" class="feather-icon"></i>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            @yield('sidebar-menu')
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="page-wrapper">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-7 align-self-center">
                            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">@yield('page-breadcrumb')</h3>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb m-0 p-0">
                                        <li class="breadcrumb-item">
                                            @yield('sub-breadcrumb')
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    @yield('content')
                    @yield('popup')
                </div>
                <footer class="footer text-center text-muted">
                    {{env('APP_NAME').' v'.env('APP_VERSION').' '.env('APP_DEV_STATUS').'.'}}
                </footer>
            </div>
        </div>
        <script src="{{asset(env('LIB_PATH').'core/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset(env('LIB_PATH').'core/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset(env('LIB_PATH').'core/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset(env('JS_PATH').'app-style-switcher.js')}}"></script>
        <script src="{{asset(env('JS_PATH').'feather.min.js')}}"></script>
        <script src="{{asset(env('LIB_PATH').'core/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{asset(env('JS_PATH').'sidebarmenu.js')}}"></script>
        <script src="{{asset(env('JS_PATH').'custom.min.js')}}"></script>
        <script src="{{asset(env('LIB_PATH').'extra/c3/d3.min.js')}}"></script>
        <script src="{{asset(env('LIB_PATH').'extra/c3/c3.min.js')}}"></script>
        <script src="{{asset(env('LIB_PATH').'extra/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{asset(env('LIB_PATH').'extra/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{asset(env('JS_PATH').'pages/dashboards/dashboard1.min.js')}}"></script>
        <script src="{{asset(env('LIB_PATH').'extra/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset(env('LIB_PATH').'extra/prism/prism.js')}}"></script>
        @yield('script-body')
    </body>
</html>
