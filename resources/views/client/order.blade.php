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
            <h6 class="card-title text-black-50">{{$order->token}}</h6>
            @if ($order->verified)
                <h6 class="card-title text-success">terverifikasi</h6>
            @else
                <h6 class="card-title text-warning">menunggu verifikasi</h6>
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
