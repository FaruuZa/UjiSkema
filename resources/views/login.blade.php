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
            <span style="text-align: right;"><a href="/" class="btn btn-outline-light">Back</a></span>

        </a>
    </nav>
    <div class="kontainer mx-auto">
        <div class="box-login mx-auto">
            <div class="img mx-auto mb-3">
                <img src="{{ asset('img/kpo (1).png') }}" alt="">
            </div>
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-dark btn-lg btn-block mt-5">LOGIN</button>
            </form>
        </div>
    </div>
@endsection
