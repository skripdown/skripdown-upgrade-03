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
    @yield('style-head')
    @yield('script-head')
</head>
<body>
<header class="shadow bg-white">
    <div class="navbar">
        <div class="nav-item">
            <a href="">
                <img src="{{asset(env('ICON_PATH'))}}" class="nav-icon" alt="">
            </a>
        </div>
        <div class="nav-item">
            @if(\Illuminate\Support\Facades\Auth::check())
                @can('isUStudent')
                    <a href="{{url('/dashboard')}}" class="btn btn-success">Editor</a>
                @elsecan
                    <a href="{{url('/dashboard')}}" class="btn btn-success">Dashboard</a>
                @endcan
            @else
                <a href="{{route('login')}}" class="btn btn-success">Masuk</a>
            @endif
        </div>
    </div>
</header>
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
</div>
<hr>
<footer>
    <p class="text-center text-muted pt-1">Copyright © {{env('APP_YEAR')}}. From <a href="{{env('APP_AUTHOR_INFO')}}" target="_blank" class="px-1 font-weight-bold text-dark">{{env('APP_NAME')}}</a> All rights reserved.</p>
</footer>
<script src="{{asset(env('JS_PATH').'feather.min.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'core/skripdown/_enc.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'core/skripdown/_response.js')}}"></script>
@yield('script-body')
</body>
</html>