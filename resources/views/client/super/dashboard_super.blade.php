@extends('client.template')

@section('title')
    Dashboard
@endsection

@section('sidebar-menu')
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <i data-feather="users" class="feather-icon"></i>
            <span class="hide-menu">Akun Pengguna</span>
        </a>
        <ul aria-expanded="false" class="collapse  first-level base-level-line">
            <li class="sidebar-item">
                <a href="{{url('/students')}}" class="sidebar-link">
                    <span class="hide-menu"> Penulis</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{url('/advisors')}}" class="sidebar-link">
                    <span class="hide-menu"> Dosen</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{url('/departments')}}" class="sidebar-link">
                    <span class="hide-menu"> Jurusan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{url('/faculties')}}" class="sidebar-link">
                    <span class="hide-menu"> Fakultas</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link sidebar-link" href="{{url('/docs')}}" aria-expanded="false">
            <i data-feather="file-text" class="feather-icon"></i>
            <span class="hide-menu">Dokumen</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link sidebar-link" href="{{url('/api')}}" aria-expanded="false">
            <i data-feather="code" class="feather-icon"></i>
            <span class="hide-menu">API</span>
        </a>
    </li>
@endsection

@section('page-breadcrumb')
    Dashboard
@endsection

@section('sub-breadcrumb')
    beranda utama {{\Illuminate\Support\Facades\Auth::user()->name}}
@endsection

@section('content')
@endsection

@section('popup')
@endsection

@section('script-body')
@endsection
