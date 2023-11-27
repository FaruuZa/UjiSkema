@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <style>
        .box-detail {
            width: 50%;
        }

        @media screen and (max-width: 1300px) {
            .box-detail {
                width: 70%;
            }
        }

        @media screen and (max-width: 1100px) {
            .box-detail {
                width: 90%;
            }
        }

        @media screen and (max-width: 855px) {

            .box-detail {
                flex-direction: column;
                height: fit-content;
            }
        }
    </style>
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
        <form action="/dashboard/data-kandidat/add" method="post" enctype="multipart/form-data">
            <div class="box-detail mx-auto">
                @csrf
                <div class="kanan" style="width: 100%">
                    <div class="det">
                        <div class="form-group">
                            <label for="nama_ketos" class="form-label">Nama Ketua Osis</label>
                            <input name="nama_ketos" type="text"
                                class="form-control @error('nama_ketos') is-invalid @enderror">
                            @error('nama_ketos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_waketos" class="form-label">Nama Wakil Ketua Osis</label>
                            <input name="nama_waketos" type="text"
                                class="form-control @error('nama_waketos') is-invalid @enderror">
                            @error('nama_waketos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="custom-file">
                            <label for="image">Foto Kandidat</label>
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                id="customFile" name="image" accept="image/*">
                            <label class="custom-file-label" for="customFile">Pilih Foto</label>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="visi" class="form-label">Visi</label>
                            <input name="visi" type="text"
                                class="form-control @error('visi') is-invalid @enderror">
                            @error('visi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea name="misi" class="form-control txtarea @error('misi') is-invalid @enderror"></textarea>
                            @error('misi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group"><button type="submit"
                                class="btn btn-outline-dark btn-block">Konfirmasi</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
