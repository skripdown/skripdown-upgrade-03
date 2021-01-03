@extends('root.template')

@section('title')
    order
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">
                Order
            </h2>
            <h6 class="card-title text-black-50"><a href="{{asset(env('PATH_CLIENT_TRANSACTION').$order->transaction)}}" target="_blank">{{$order->token}}</a></h6>
            @if ($order->verified)
                <h6 class="card-title text-success">terverifikasi</h6>
            @else
                @if (\Illuminate\Support\Facades\Auth::check())
                    @if (\Illuminate\Support\Facades\Auth::user()->role == 'developer')
                        @if (\Illuminate\Support\Facades\Auth::user()->developer->role == 'admin')
                            <h6 class="card-title text-danger">
                                belum terverifikasi
                                <span class="btn btn-sm btn-info ml-3" type="button" data-toggle="modal" data-target="#popup_verify_agree">verifikasi</span>
                                <span class="btn btn-sm btn-danger ml-1" type="button" data-toggle="modal" data-target="#popup_verify_cancel">batal</span>
                            </h6>
                        @else
                            <h6 class="card-title text-warning">menunggu verifikasi admin</h6>
                        @endif
                    @endif
                @else
                    <h6 class="card-title text-warning">menunggu verifikasi</h6>
                @endif
            @endif
            <hr>
            <form>
                <div class="form-group">
                    <div class="form-group">
                        <label for="name" class="d-none"></label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" value="{{$order->name}}" readonly>
                        <small class="badge badge-default badge-success form-text text-white">nama</small>
                    </div>
                    <div class="form-group">
                        <label for="identity" class="d-none"></label>
                        <input type="text" class="form-control" id="identity" aria-describedby="name" value="{{$order->identity}}" readonly>
                        <small class="badge badge-default badge-success form-text text-white">nomor identitas</small>
                    </div>
                    <div class="form-group">
                        <label for="previlege-name" class="d-none"></label>
                        <input type="text" class="form-control" id="previlege-name" aria-describedby="name" value="{{$order->previlege->name}}" readonly>
                        <small class="badge badge-default badge-success form-text text-white">layanan</small>
                    </div>
                    <div class="form-group">
                        <label for="previlege-price" class="d-none"></label>
                        @if ($order->previlege->price == 0)
                            <input type="text" class="form-control" id="previlege-price" aria-describedby="name" value="GRATIS" readonly>
                        @else
                            <input type="text" class="form-control" id="previlege-price" aria-describedby="name" value="Rp {{$order->previlege->price}}.000.000" readonly>
                        @endif
                        <small class="badge badge-default badge-success form-text text-white">harga</small>
                    </div>
                    <div class="form-group">
                        <label for="email" class="d-none"></label>
                        <input type="text" class="form-control" id="email" aria-describedby="name" value="{{$order->email}}" readonly>
                        <small class="badge badge-default badge-success form-text text-white">email</small>
                    </div>
                    <div class="form-group">
                        <label for="date" class="d-none"></label>
                        <input type="text" class="form-control" id="date" aria-describedby="name" value="{{$order->updated_at}}" readonly>
                        <small class="badge badge-default badge-success form-text text-white">waktu pembahruan</small>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@if (\Illuminate\Support\Facades\Auth::check())
    @if (\Illuminate\Support\Facades\Auth::user()->role == 'developer')
        @if (\Illuminate\Support\Facades\Auth::user()->developer->role == 'admin')
@section('pop-up')
    <div id="popup_verify_agree"></div>
    <div id="popup_verify_cancel"></div>
@endsection

@section('script-body')
    <script src="{{asset(env('LIB_PATH').'core/skripdown/_dev.js')}}"></script>
    <script src="{{asset(env('LIB_PATH').'core/skripdown/_data.js')}}"></script>
    <script src="{{asset(env('LIB_PATH').'core/skripdown/_enc.js')}}"></script>
    <script src="{{asset(env('LIB_PATH').'core/skripdown/_response.js')}}"></script>
    <script src="{{asset(env('LIB_PATH').'core/skripdown/_ui_factory.js')}}"></script>
    <script>
        @include('root.token')
        console.log('{{csrf_token()}}');
        _dev.order.insert({!! $order !!});
        const a = ()=>{
            const ctr     = document.createElement('div');
            const btn_ver = document.createElement('a');
            const parag   = document.createElement('p');
            btn_ver.innerHTML   = 'verifikasi';
            parag.innerHTML   = 'Apakah anda yakin ingin memverifikasi order ini ? ';
            btn_ver.setAttribute('class','btn btn-sm btn-success float-right text-white');
            btn_ver.setAttribute('type','button');
            btn_ver.addEventListener('click', function () {
                _response.post({url:'{{url('verifyOrder')}}',data:{id:'{{$order->id}}'}});
                if (_response.response._status)
                    close();
            });
            ctr.append(parag);
            ctr.append(btn_ver);

            return [ctr];
        }
        const b = ()=>{
            const ctr     = document.createElement('div');
            const btn_ver = document.createElement('a');
            const parag   = document.createElement('p');
            btn_ver.innerHTML   = 'tolak';
            parag.innerHTML   = 'Apakah anda yakin ingin menolak order ini ? ';
            btn_ver.setAttribute('class','btn btn-sm btn-secondary float-right text-white');
            btn_ver.setAttribute('type','button');
            ctr.append(parag);
            ctr.append(btn_ver);
            btn_ver.addEventListener('click', function () {
                _response.post({url:'{{url('cancelOrder')}}',data:{id:'{{$order->id}}'}});
                if (_response.response._status)
                    close();
            });

            return [ctr];
        }
        const res_a = a();
        const res_b = b();
        _popup.render({
            element:'popup_verify_agree',
            title:'<strong>verifikasi order</strong>',
            content:res_a[0],
        });
        _popup.render({
            element:'popup_verify_cancel',
            title:'<strong>tolak order</strong>',
            content:res_b[0],
        });
    </script>
@endsection
@endif
@endif
@endif
