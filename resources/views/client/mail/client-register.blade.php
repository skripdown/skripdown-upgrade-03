@extends('client.mail.template')


@section('content-header')
    Hello {{$name}} 👋
@endsection

@section('content')
    <p>
        Welcome to Skripdown. Thanks for using Skripdown service.
        Click link down below to continue account registration.
    </p>
    <p>
        <a href="{{$link}}">{{$link}}</a>
    </p>
@endsection
