@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endpush

@section('body')
    <nav class="navbar navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/kpo (1).png') }}" width="30" height="30" class="d-inline-block align-top"
                alt="">
            Ketosin
            <span style="text-align: right;"><a href="/logout" class="btn btn-outline-light">Logout</a></span>
        </a>
    </nav>
    <div class="container-sm">
        <h1>Dashboard Admin</h1>
        <div class="card-deck mt-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pemilih</h4>
                </div>
                <div class="card-footer">
                    <a class="btn btn-outline-dark" href="dashboard/data-pemilih">Lihat pemilih</a>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Kandidat</h4>
                </div>
                <div class="card-footer">
                    <a class="btn btn-outline-dark" href="dashboard/data-kandidat">Lihat kandidat</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Admin</h4>
                </div>
                <div class="card-footer">
                    <a class="btn btn-outline-dark" href="dashboard/data-admin">Lihat Admin</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hasil Pemilihan</h4>
                </div>
                <div class="card-footer">
                    <a class="btn btn-outline-dark" href="dashboard/hasil-vote">Lihat Hasil</a>
                </div>
            </div>
        </div>
    </div>
@endsection
