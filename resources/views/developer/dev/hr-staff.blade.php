@extends('developer.template')

@section('title')
    administrator
@endsection

@section('content')
    <div id="order-ctr"></div>
@endsection

@section('script-body')
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
                        column : [
                            {content : 'id',class : 'text-center'},
                            {content : 'nama',class : 'text-center'},
                            {content : 'token',class : 'text-center'},
                            {content : 'paket',class : 'text-center'},
                        ],
                    })
                }
            ],
        });
    </script>
@endsection
