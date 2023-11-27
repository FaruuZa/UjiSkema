@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('body')
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/kpo (1).png') }}" width="30" height="30" class="d-inline-block align-top"
                alt="">
            Ketosin
            <span style="text-align: right;"><a href="/dashboard/data-admin" class="btn btn-outline-light">Back</a></span>

        </a>
    </nav>
    <div class="kontainer mx-auto">
        <div class="box-login mx-auto">
            <form action="/dashboard/data-admin/edit/{{ $target->id }}" method="POST">
                <legend>Edit Akun Admin</legend>
                @csrf
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="{{ $target->username }}">
                <label for="email">email</label>
                <input type="email" class="form-control" name="email" value="{{ $target->email }}">
                <button type="submit" class="btn btn-outline-dark btn-lg btn-block mt-5">Konfirmasi</button>
            </form>
        </div>
    </div>
@endsection
