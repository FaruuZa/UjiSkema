@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endpush

@section('body')
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/kpo (1).png') }}" width="30" height="30" class="d-inline-block align-top"
                alt="">
            Ketosin
            @if (Auth::check())
            <span style="text-align: right;"><a href="/dashboard" class="btn btn-outline-light">Dashboard</a></span>
            @elseif(Auth::guard('pemilih')->check())
            <span style="text-align: right;"><a href="/user" class="btn btn-outline-light">Voting</a></span>
            @else
            <span style="text-align: right;"><a href="/login" class="btn btn-outline-light">Login</a></span>
            @endif
        </a>
    </nav>
    <div class="container-sm">
        <h1>Ketosin</h1>
        <img src="{{ asset('img/kpo (1).png') }}" alt="" class="logo">
    </div>
@endsection
