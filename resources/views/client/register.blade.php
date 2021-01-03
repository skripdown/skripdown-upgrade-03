@extends('root.template')

@section('title')
    daftar
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">
                Daftar
            </h2>
            <h4 class="card-title text-black-50">Tipe layanan : {{$plan->name}}</h4>
            <hr>
            <form id="form">
                <div class="form-group">
                    <input id="ip-0" class="d-none" type="hidden" name="plan" value="{{$plan->id}}">
                    <label for="ip-1" class="d-none"></label>
                    <input id="ip-1" type="text" name="identity" class="form-control mt-4" placeholder="nomor id perguruan tinggi">
                    <label for="ip-2" class="d-none"></label>
                    <input id="ip-2" type="text" name="name" class="form-control mt-4" placeholder="nama perguruan tinggi">
                    <label for="ip-3" class="d-none"></label>
                    <input id="ip-3" type="email" name="email" class="form-control mt-4" placeholder="email">
                    <label id="label-ip" for="ip-4" class="d-none"></label>
                    <input id="ip-4" type="password" name="password" class="form-control mt-4" placeholder="kata sandi">
                    <h6 class="card-subtitle mt-4">verifikasi kata sandi</h6>
                    <label for="ip-5" class="d-none"></label>
                    <input id="ip-5" type="password" name="verify" class="form-control" placeholder="verifikasi kata sandi">
                    <label for="ip-6" class="d-none"></label>
                    <input id="ip-6" type="text" name="city" class="form-control mt-4" placeholder="kota">
                    <h6 class="card-subtitle mt-4">berkas dalam bentuk <code>.jpg</code> , <code>.jpeg</code> atau <code>.png</code></h6>
                    <div class="custom-file">
                        <input type="file" name="pic" class="custom-file-input" id="ip-7">
                        <label class="custom-file-label text-muted" for="ip-7">foto profil</label>
                    </div>
                    <div class="mt-4 d-block text-white">d</div>
                    @if($plan->price != 0)
                        <h6 class="card-subtitle mt-4">berkas dalam bentuk <code>.jpg</code> , <code>.jpeg</code> atau <code>.png</code></h6>
                        <div class="custom-file">
                            <input type="file" name="transaction" class="custom-file-input" id="ip-8">
                            <label id="ip-8-alias" class="custom-file-label text-muted" for="ip-8">bukti transfer</label>
                        </div>
                    @endif
                    <h6 class="card-subtitle mt-4">Pastikan untuk menyalin token akun di bawah sebelum pindah dari halaman registrasi.
                        <br>token <code>tidak akan ditampilkan kembali</code> kecuali setelah melakukan registrasi.
                    </h6>
                    <div class="form-group">
                        <label for="readonly" class="d-none"></label>
                        <input type="text" class="form-control" id="readonly" name="token" value="{{$plan->token}}" readonly>
                    </div>
                </div>
                <div class="mt-4 d-block text-white">d</div>
                <div class="form-group text-right mt-4">
                    <a id="submit-form" href="javascript:void(0)" type="button" class="btn btn-success pl-4 pr-4">daftar</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script-body')
    <script src="{{asset(env('LIB_PATH').'core/jquery/dist/jquery.min.js')}}"></script>
    <script>
        @include('root.token')
        _mailmatch.for('ip-3');
        _passmatch.for({source:'ip-4',target:'ip-5',label:'label-ip'});
        _ctclipboard.for('readonly');
        _form.for({
            submit : 'submit-form',
            elements : ['ip-0','ip-1','ip-2','ip-3','ip-4','ip-5','ip-6','ip-7'@if($plan->price != 0),'ip-8'@endif,'readonly'],
            alias : {@if($plan->price != 0)'ip-8':'ip-8-alias'@endif},
            pass : 'ip-4',
            verify : 'ip-5',
            optional : {'ip-7':true},
            func : function (elements) {
                const data  = {};
                let file = undefined;
                for (let i = 0; i < elements.length; i++) {
                    data[elements[i].getAttribute('name')] = elements[i].value;
                    if (elements[i].getAttribute('type') === 'file') {
                        if (file === undefined)
                            file = {};
                        file[elements[i].getAttribute('name')] = elements[i].files[0];
                    }
                }
                _response.post({async:false,url:'{{url('registerSubmit')}}', data:data,file:file});
                if (_response.response._status) {
                    location.href = '{{url('/order/'.$plan->token)}}';
                }
            }
        });
    </script>
@endsection
