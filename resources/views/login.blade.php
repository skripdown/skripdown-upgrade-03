<!DOCTYPE html>
<html lang="{{env('APP_LANG')}}" dir="{{env('APP_DIR')}}">
<head>
    <meta charset="{{env('APP_CHARSET')}}">
    <meta name="viewport" content="{{env('APP_VIEWPORT')}}">
    <meta name="description" content="{{env('APP_DESCRIPTION')}}">
    <meta name="author" content="{{env('APP_AUTHOR')}}">
    <link rel="icon" type="image/png" sizes="{{env('ICON_SIZE')}}" href="{{asset(env('ICON_PATH'))}}">
    <link href="{{asset(env('CSS_PATH').'style.min.css')}}" rel="stylesheet">
    <style>
        #app-bg {
            background-image: url("{{asset('asset/bg-blank.png')}}");
        }
    </style>
    <script src="{{asset(env('LIB_PATH').'extra/html5shiv/html5shiv.js')}}"></script>
    <script src="{{asset(env('LIB_PATH').'extra/respond/respond.js')}}"></script>
    <title>{{env('APP_NAME'),' login'}}</title>
</head>
<body>
<div class="main-wrapper">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" id="app-bg">
        <div class="auth-box row shadow-lg">
            <div class="col-12 bg-white" style="border-radius: 1.5%; padding-bottom: 1vw">
                <div class="p-3">
                    <h2 class="text-center">
                        <img src="{{asset(env('ICON_PATH'))}}" alt="" style="width: 100pt; margin-bottom: -3.5%; margin-top: -1.5%">
                    </h2>
                    <p class="text-center">Masukkan ID dan kata sandi untuk mengakses Skripdown.</p>
                    <form class="mt-4" method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="identity">ID</label>
                                    <input class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" id="identity" type="text" placeholder="masukkan NID" name="identity" required autofocus>
                                    @if ($errors->has('identity'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('identity') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="pwd">Kata Sandi</label>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="pwd" type="password" placeholder="masukkan kata sandi" name="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-block btn-success">Masuk</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset(env('LIB_PATH').'core/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'core/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'core/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script>
    $(".preloader ").fadeOut();
</script>
</body>
</html>
