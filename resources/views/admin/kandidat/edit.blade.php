@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush

@section('body')
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/kpo (1).png') }}" width="30" height="30" class="d-inline-block align-top"
                alt="">
            Ketosin
            <span style="text-align: right;"><a href="/dashboard/data-kandidat"
                    class="btn btn-outline-light">Back</a></span>
            {{-- <span style="text-align: right;">{{ Auth::guard('pemilih')->user()->username }}</span> --}}

        </a>
    </nav>
    <div class="kontainer mx-auto">
        <form action="/dashboard/data-kandidat/edit/{{ $kandidat->id }}" method="post" enctype="multipart/form-data">
            <div class="box-detail mx-auto">
                @csrf
                <div class="kiri">
                    <div class="img ml-3"><img src="{{ asset('img/' . $kandidat->image) }}" alt=""></div>
                </div>
                <div class="kanan">
                    <div class="det">
                        <div class="form-group">
                            <label for="nama_ketos" class="form-label">Nama Ketua Osis</label>
                            <input name="nama_ketos" type="text" class="form-control"
                                value="{{ $kandidat->nama_ketos }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_waketos" class="form-label">Nama Wakil Ketua Osis</label>
                            <input name="nama_waketos" type="text" class="form-control"
                                value="{{ $kandidat->nama_waketos }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_waketos" class="form-label">Foto Kandidat</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="visi" class="form-label">Visi</label>
                            <input name="visi" type="text" class="form-control" value="{{ $kandidat->visi }}">
                        </div>
                        <div class="form-group">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea name="misi" class="form-control txtarea">{{ $kandidat->misi }}</textarea>
                        </div>
                        <div class="form-group"><button type="submit"
                                class="btn btn-outline-dark btn-block">Konfirmasi</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
