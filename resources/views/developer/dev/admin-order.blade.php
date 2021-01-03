@extends('developer.template')

@section('title')
    administrator
@endsection

@section('content')
    <div id="order-ctr" class=""></div>
@endsection

@section('script-body')
    <script src="{{asset(env('LIB_PATH').'core/skripdown/_dev.js')}}"></script>
    <script src="{{asset(env('LIB_PATH').'core/skripdown/_data.js')}}"></script>
    <script src="{{asset(env('LIB_PATH').'core/skripdown/_enc.js')}}"></script>
    <script src="{{asset(env('LIB_PATH').'core/skripdown/_response.js')}}"></script>
    <script src="{{asset(env('LIB_PATH').'core/skripdown/_ui_factory.js')}}"></script>
    <script>
        @include('root.token')
        _card.render({
            element : 'order-ctr',
            items : [
                {
                    title : 'riwayat order',
                    label : 'ti-book',
                    content : _tables.render({
                        element : 'order-data',
                        template : 'custom',
                        column : [
                            {content : 'Profil',class : 'text-center'},
                            {content : 'Order',class : 'text-center'},
                            {content : 'Jenis Layanan',class : 'text-center'},
                            {content : 'Waktu',class : 'text-center'},
                        ],
                    })
                }
            ],
        });
        _dev.order.init(function (data) {
            _response.post({async:false,url:'{{url('')}}', data:data});
            return _response.response._status;
        });
        @foreach($res->orders as $order)
            _dev.order.insert({!! $order !!});
            _tables.insert({element:'order-data', column : [
                {content:'<div class="d-flex no-block align-items-center"><div class="mr-3"><img src="{{asset(env('PATH_CLIENT_PROFILE').$order->pic)}}" alt="user" class="rounded-circle" width="45" height="45" /></div><div class=""><h5 class="text-dark mb-0 font-16 font-weight-medium">{{$order->name}}</h5><span class="text-muted font-14">{{$order->email}}</span></div></div>'},
                {content:'<a href="{{url('/order/'.$order->token)}}" target="_blank">{{$order->token}}</a>'},
                {content:'<span class="font-weight-bold text-info pr-2">{{$order->previlege->name}} </span><span>Rp {{$order->previlege->price}}.000.000</span>'},
                {content:'{{$order->id}}'},
            ],});
        @endforeach
    </script>
@endsection
