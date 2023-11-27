@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/voting.css') }}">
@endpush

@section('body')
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/kpo (1).png') }}" width="30" height="30" class="d-inline-block align-top"
                alt="">
            Ketosin
            <span style="text-align: right;"><a href="/dashboard" class="btn btn-outline-light">Kembali</a></span>
            {{-- <span style="text-align: right;">{{ Auth::guard('pemilih')->user()->username }}</span> --}}

        </a>
    </nav>
    <div class="kontainer mx-auto">
        <div class="box-welcome">
            <h2>Perolehan Suara saat ini:</h2>
        </div>

        <div class="box-container mx-auto">
            @foreach ($kandidats as $item)
                <div class="box-pilih mx-auto mt-3">
                    <span class="qwe">Kandidat {{ $loop->iteration }}</span>
                    <img class="img" src="{{ asset('img/' . $item->image) }}" alt="">
                    {{-- <div class="img"></div> --}}
                    <div class="box-btn">
                        <div class="btn btn-outline-dark qwe">{{ $item->terpilih }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset('js/vote.js') }}"></script>
@endpush
