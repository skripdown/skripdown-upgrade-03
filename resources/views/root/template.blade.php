<!DOCTYPE html>
<html lang="{{env('APP_LANG')}}" dir="{{env('APP_DIR')}}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta charset="{{env('APP_CHARSET')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="{{env('APP_VIEWPORT')}}">
    <meta name="description" content="{{env('APP_DESCRIPTION')}}">
    <meta name="author" content="{{env('APP_AUTHOR')}}">
    <link rel="icon" type="image/png" href="{{asset(env('ICON_PATH'))}}">
    <link rel="stylesheet" href="{{asset(env('CSS_PATH').'style.min.css')}}">
    <link rel="stylesheet" href="{{asset(env('CSS_PATH').'added.css')}}">
    <script src="{{asset(env('LIB_PATH').'extra/html5shiv/html5shiv.js')}}"></script>
    <script src="{{asset(env('LIB_PATH').'extra/respond/respond.js')}}"></script>
    @include('root.preloader_style')
    @yield('style-head')
    @yield('script-head')
</head>
<body>
<header class="shadow bg-white">
    <div class="navbar">
        <div class="nav-item">
            <a href="{{url('/')}}">
                <img src="{{asset(env('ICON_PATH'))}}" class="nav-icon" alt="">
            </a>
        </div>
        <div class="nav-item">
            @if(\Illuminate\Support\Facades\Auth::check())
                @can('isUStudent')
                    <a href="{{url('/dashboard')}}" class="btn btn-success">Editor</a>
                @else
                    <a href="{{url('/dashboard')}}" class="btn btn-success">Dashboard</a>
                @endcan
            @else
                <a href="{{route('login')}}" class="btn btn-success">Masuk</a>
            @endif
        </div>
    </div>
</header>
@include('root.preloader')
<div class="container pt-4 container-mh-90">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 d-md-1"></div>
            <div class="col-lg-8 col-md-10">
                @yield('content')
            </div>
            <div class="col-lg-2 d-md-1"></div>
        </div>
    </div>
    @yield('pop-up')
</div>
<hr>
<footer>
    <p class="text-center text-muted pt-1">Copyright © {{env('APP_YEAR')}}. From <a href="{{env('APP_AUTHOR_INFO')}}" target="_blank" class="px-1 font-weight-bold text-dark">{{env('APP_NAME')}}</a> All rights reserved.</p>
</footer>
<script src="{{asset(env('LIB_PATH').'core/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset(env('JS_PATH').'feather.min.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'core/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'core/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'core/skripdown/_enc.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'core/skripdown/_response.js')}}"></script>
<script>
    $(".preloader ").fadeOut();
</script>
@yield('script-body')
</body>
</html>
