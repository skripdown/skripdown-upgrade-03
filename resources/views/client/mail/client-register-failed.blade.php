@extends('client.mail.template')

@section('content-header')
    Hello {{$name}} 👋
@endsection

@section('content')
    <p>
        We're so sorry but it seems that something is wrong
        with the transaction. please verify it again.
    </p>
@endsection
