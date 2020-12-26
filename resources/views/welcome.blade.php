@php
    if (isset($response)) {
        $tot_dokumen = $response->total_doc;
        $tot_aktif   = $response->total_active;
        $previleges  = $response->previleges;
    }
@endphp
<!DOCTYPE html>
<html lang="{{env('APP_LANG')}}">
<head>
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="{{env('APP_VIEWPORT')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="{{env('ICON_SIZE')}}" href="{{asset(env('ICON_PATH'))}}">
    <link rel="stylesheet" href="{{asset(env('LIB_PATH').'extra/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset(env('LIB_PATH').'extra/owl-carousel/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset(env('LIB_PATH').'extra/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset(env('LIB_PATH').'extra/vivify/vivify.min.css')}}">
    <link rel="stylesheet" href="{{asset(env('LIB_PATH').'extra/aos/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset(env('CSS_PATH').'landing/style.min.css')}}">
    <link rel="stylesheet" href="{{asset(env('CSS_PATH').'added.css')}}">
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
<header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
        <div class="container">
            <div class="navbar-brand-wrapper d-flex w-100">
                <img src="{{asset(env('ICON_PATH'))}}" alt="" width="80">
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="mdi mdi-menu navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                    <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                        <div class="navbar-collapse-logo">
                            <img src="{{asset(env('ICON_PATH'))}}" alt="" width="80">
                        </div>
                        <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#header-section">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features-section">How?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#digital-marketing-section">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#repository-section">Layanan</a>
                    </li>
                    <li class="nav-item btn-contact-us pl-4 pl-lg-0">
                        @if(\Illuminate\Support\Facades\Auth::check())
                            @can('isUStudent')
                                <a href="{{url('/dashboard')}}" class="btn btn-success">Editor</a>
                            @elsecan
                                <a href="{{url('/dashboard')}}" class="btn btn-success">Dashboard</a>
                            @endcan
                        @else
                            <a href="{{route('login')}}" class="btn btn-success">Masuk</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="banner">
    <div class="container">
        <h1 class="font-weight-semibold">{{env('APP_NAME')}}: {{env('APP_DESCRIPTION')}}</h1>
        <h6 class="font-weight-normal text-muted pb-3">{{env('APP_SUBTITLE')}}</h6>
        <img src="{{asset('asset/banner.svg')}}" alt="" class="img-fluid mt-5 mb-5" style="height: 40vh">
    </div>
</div>
<div class="content-wrapper">
    <div class="container">
        <section class="features-overview" id="features-section" >
            <div class="content-header">
                <h2>Cara kerja Skripdown</h2>
                <h6 class="section-subtitle text-muted">Skripdown didesain khusus untuk mempercepat penulisan skripsi<br>dan membantu memanajemen pengerjaan skripsi.</h6>
            </div>
            <div class="d-md-flex justify-content-between">
                <div class="grid-margin d-flex justify-content-start">
                    <div class="features-width">
                        <h5 class="py-4">Format<br>Otomatis</h5>
                        <p class="text-muted">Mengatur seksi dokumen dan format penulisan skripsi secara otomatis</p>
                    </div>
                </div>
                <div class="grid-margin d-flex justify-content-center">
                    <div class="features-width">
                        <h5 class="py-4">Manajemen<br>Konten</h5>
                        <p class="text-muted">Memanajemen pengerjaan dokumen skripsi secara otomatis dan <i>real-time</i></p>
                    </div>
                </div>
                <div class="grid-margin d-flex justify-content-end">
                    <div class="features-width">
                        <h5 class="py-4">Sintaks<br>Markdown</h5>
                        <p class="text-muted">Penggunaan bahasa markdown sebagai sintaks penulisan dokumen.</p>
                    </div>
                </div>
                <div class="grid-margin d-flex justify-content-end">
                    <div class="features-width">
                        <h5 class="py-4">Deteksi<br>Error</h5>
                        <p class="text-muted">Mendeteksi error pada penulisan skripsi secara otomatis.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="digital-marketing-service" id="digital-marketing-section">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
                    <h3 class="m-0">Sintaks berbasis Markdown<br>sebagai penulisan dokumen skripsi!</h3>
                    <div class="col-lg-7 col-xl-6 p-0">
                        <p class="py-4 m-0 text-muted">Sintaks berbasis bahasa markdown seperti <span class="text-info">**<strong class="text-dark">bold</strong>**</span>, <span class="text-info">*<em class="text-dark">italic</em>*</span>, <span class="text-info">__<u class="text-dark">underline</u>__</span>.</p>
                        <p class="font-weight-medium text-muted">membuat tabel, memuat gambar dan indeks penomoran.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                    <img src="{{asset('asset/fitur-1.svg')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
                    <img src="{{asset('asset/fitur-2.svg')}}" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
                    <h3 class="m-0">Format dan generator<br>seksi dokumen skripsi secara otomatis.</h3>
                    <div class="col-lg-9 col-xl-8 p-0">
                        <p class="py-4 m-0 text-muted">Penambahan sintaks meta pada markdown membuat informasi tambahan dapat dimuat sehingga penulisan dokumen dapat dibuat lebih spesifik.</p>
                        <p class="pb-2 font-weight-medium text-muted">Selain sintaks meta, heading juga didesain sesuai dengan struktur dokumen skripsi.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center" style="margin: -10rem 0 5rem">
                <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
                    <h3 class="m-0">Deteksi error<br>pada struktur isi dokumen skripsi</h3>
                    <div class="col-lg-7 col-xl-6 p-0">
                        <p class="py-4 m-0 text-muted"><b>Skripdown</b> memiliki fitur deteksi error otomatis pada editor markdown yang akan memberikan notifikasi dan jenis pesan jika mendeteksi error pada isi dokumen.</p>
                        <p class="font-weight-medium text-muted">Pendeteksian error dapat membantu penulis dalam mengerjakan skripsi dan mengurangi jumlah revisi.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                    <img src="{{asset('asset/fitur-3.svg')}}" alt="" class="img-fluid">
                </div>
            </div>
        </section>
        <section class="features-overview" id="repository-section">
            <div class="content-header">
                <div class="span-area">
                    <div class="ept-span"></div>
                    <div class="fill-span">
                        <h2>Layanan Skripdown</h2>
                        <div class="container-fluid">
                            <div class="card-group">
                                @php
                                    $iter = 0;
                                @endphp
                                @while($iter < 3)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex d-lg-flex d-md-block align-items-center shadow-lg">
                                                <div class="w-100">
                                                    <div class="card-title bg-success pt-3 pb-1">
                                                        <h4 class="text-white">{{$previleges[$iter]->name}}</h4>
                                                    </div>
                                                    <div class="p-4 mb-2">
                                                        <h4 class="pb-3">
                                                            <span class="text-info">Rp {{$previleges[$iter]->price}} juta</span>
                                                            <span class="text-muted" style="font-size: 10pt">
                                                            / tahun
                                                        </span>
                                                        </h4>
                                                        <a href="{{url('/register/'.$previleges[$iter]->id)}}" class="btn btn-info font-weight-semibold mb-3">Pilih Sekarang</a>
                                                        <div class="w-75 ml-auto mr-auto pt-2 text-left border-top">
                                                            @if ($previleges[$iter]->quota_faculty > 9999999)
                                                                <div class="mt-1 mb-1"><span class="text-info">Unlimited</span> <span class="text-muted" style="font-size: 10pt">Fakultas</span></div>
                                                            @else
                                                                <div class="mt-1 mb-1">{{$previleges[$iter]->quota_faculty}} <span class="text-muted" style="font-size: 10pt">Fakultas</span></div>
                                                            @endif
                                                            @if ($previleges[$iter]->quota_department > 9999999)
                                                                <div class="mt-1 mb-1"><span class="text-info">Unlimited</span> <span class="text-muted" style="font-size: 10pt">Department</span></div>
                                                            @else
                                                                <div class="mt-1 mb-1">{{$previleges[$iter]->quota_department}} <span class="text-muted" style="font-size: 10pt">Department</span></div>
                                                            @endif
                                                            @if ($previleges[$iter]->quota_advisor > 9999999)
                                                                <div class="mt-1 mb-1"><span class="text-info">Unlimited</span> <span class="text-muted" style="font-size: 10pt">Pembimbing</span></div>
                                                            @else
                                                                <div class="mt-1 mb-1">{{$previleges[$iter]->quota_advisor}} <span class="text-muted" style="font-size: 10pt">Pembimbing</span></div>
                                                            @endif
                                                            @if ($previleges[$iter]->quota_document > 9999999)
                                                                <div class="mt-1 mb-1"><span class="text-info">Unlimited</span> <span class="text-muted" style="font-size: 10pt">Dokumen</span></div>
                                                            @else
                                                                <div class="mt-1 mb-1">{{$previleges[$iter]->quota_document}} <span class="text-muted" style="font-size: 10pt">Dokumen</span></div>
                                                            @endif
                                                            @if ($previleges[$iter]->quota_template > 9999999)
                                                                <div class="mt-1 mb-1"><span class="text-info">Unlimited</span> <span class="text-muted" style="font-size: 10pt">Template</span></div>
                                                            @else
                                                                <div class="mt-1 mb-1">{{$previleges[$iter]->quota_template}} <span class="text-muted" style="font-size: 10pt">Template</span></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        if (isset($iter)) {
                                            $iter++;
                                        }
                                    @endphp
                                @endwhile
                            </div>
                            <div class="card-group d-none" id="hidden-service">
                                @while($iter < count($previleges))
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex d-lg-flex d-md-block align-items-center shadow-lg">
                                                <div class="w-100">
                                                    <div class="card-title bg-success pt-3 pb-1">
                                                        <h4 class="text-white">{{$previleges[$iter]->name}}</h4>
                                                    </div>
                                                    <div class="p-4 mb-2">
                                                        <h4 class="pb-3">
                                                            <span class="text-info">Rp {{$previleges[$iter]->price}} juta</span>
                                                            <span class="text-muted" style="font-size: 10pt">
                                                            / tahun
                                                        </span>
                                                        </h4>
                                                        <a href="{{url('/register/'.$previleges[$iter]->id)}}" class="btn btn-info font-weight-semibold mb-3">Pilih Sekarang</a>
                                                        <div class="w-75 ml-auto mr-auto pt-2 text-left border-top">
                                                            @if ($previleges[$iter]->quota_faculty > 9999999)
                                                                <div class="mt-1 mb-1"><span class="text-info">Unlimited</span> <span class="text-muted" style="font-size: 10pt">Fakultas</span></div>
                                                            @else
                                                                <div class="mt-1 mb-1">{{$previleges[$iter]->quota_faculty}} <span class="text-muted" style="font-size: 10pt">Fakultas</span></div>
                                                            @endif
                                                            @if ($previleges[$iter]->quota_department > 9999999)
                                                                 <div class="mt-1 mb-1"><span class="text-info">Unlimited</span> <span class="text-muted" style="font-size: 10pt">Department</span></div>
                                                            @else
                                                                 <div class="mt-1 mb-1">{{$previleges[$iter]->quota_department}} <span class="text-muted" style="font-size: 10pt">Department</span></div>
                                                            @endif
                                                            @if ($previleges[$iter]->quota_advisor > 9999999)
                                                                <div class="mt-1 mb-1"><span class="text-info">Unlimited</span> <span class="text-muted" style="font-size: 10pt">Pembimbing</span></div>
                                                            @else
                                                                <div class="mt-1 mb-1">{{$previleges[$iter]->quota_advisor}} <span class="text-muted" style="font-size: 10pt">Pembimbing</span></div>
                                                            @endif
                                                            @if ($previleges[$iter]->quota_document > 9999999)
                                                                <div class="mt-1 mb-1"><span class="text-info">Unlimited</span> <span class="text-muted" style="font-size: 10pt">Dokumen</span></div>
                                                            @else
                                                                <div class="mt-1 mb-1">{{$previleges[$iter]->quota_document}} <span class="text-muted" style="font-size: 10pt">Dokumen</span></div>
                                                            @endif
                                                            @if ($previleges[$iter]->quota_template > 9999999)
                                                                <div class="mt-1 mb-1"><span class="text-info">Unlimited</span> <span class="text-muted" style="font-size: 10pt">Template</span></div>
                                                            @else
                                                                <div class="mt-1 mb-1">{{$previleges[$iter]->quota_template}} <span class="text-muted" style="font-size: 10pt">Template</span></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        if (isset($iter)) {
                                            $iter++;
                                        }
                                    @endphp
                                @endwhile
                            </div>
                        </div>
                        <div>
                            <a id="hidden-service-btn" href="javascript:void(0)" type="button" class="link btn btn-sm btn-outline-info">Detail Layanan Lainnya</a>
                        </div>
                    </div>
                    <div class="ept-span"></div>
                </div>
            </div>
        </section>
        <footer class="border-top">
            <p class="text-center text-muted pt-4">Copyright © {{env('APP_YEAR')}}. From <a href="https://www.instagram.com/malkolp/" target="_blank" class="px-1 font-weight-bold text-dark">Skripdown. inc</a>All rights reserved.</p>
        </footer>
    </div>
</div>
<script src="{{asset(env('LIB_PATH').'core/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'core/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'extra/owl-carousel/js/owl.carousel.min.js')}}"></script>
<script src="{{asset(env('LIB_PATH').'extra/aos/js/aos.js')}}"></script>
<script src="{{asset(env('JS_PATH').'feather.min.js')}}"></script>
<script src="{{asset(env('JS_PATH').'landingpage.js')}}"></script>
</body>
</html>
