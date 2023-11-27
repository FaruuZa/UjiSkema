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
            <span style="text-align: right;"><a href="/dashboard" class="btn btn-outline-light">Kembali</a></span>
        </a>
    </nav>
    <div class="container-sm pt-4">
        <h1>Data Kandidat</h1>
        <div class="jumbotron" style="width:85%; background-color: white;">
            <a href="/dashboard/data-kandidat/add" class="btn btn-outline-dark mb-3">Tambah Kandidat</a>
            <div class="table-responsive">
                <table class="table text-center table-striped " style="box-shadow: 0 0 1px black">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ketos</th>
                            <th>Nama Waketos</th>
                            {{-- <th>gambar</th> --}}
                            <th>Visi</th>
                            {{-- <th>Misi</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($kandidats) > 0)
                            @foreach ($kandidats as $item)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_ketos }}</td>
                                    <td>{{ $item->nama_waketos }}</td>
                                    <td>{{ $item->visi }}</td>
                                    {{-- <td>{{ $item->misi }}</td> --}}
                                    <td>
                                        <a href="/dashboard/data-kandidat/detail/{{ $item->id }}"
                                            class="btn btn-outline-dark btn-sm">Detail</a>
                                        <a href="/dashboard/data-kandidat/edit/{{ $item->id }}"
                                            class="btn btn-outline-warning btn-sm">Edit</a>
                                        <div href="/dashboard/data-kandidat/delete/{{ $item->id }}"
                                            class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="{{ $item->id }}">Hapus</div>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">Tidak Ada Data</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/dashboard/data-kandidat/delete" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @csrf
                        <div class="modal-body px-4">
                            <input type="text" readonly name="id" id="id" hidden>
                            Apakah anda yakin ingin menghapus akun ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-outline-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('js/vote.js') }}"></script>
@endpush
