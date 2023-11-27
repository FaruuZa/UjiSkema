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
            <span style="text-align: right;"><a href="/logout" class="btn btn-outline-light">Logout</a></span>
            {{-- <span style="text-align: right;">{{ Auth::guard('pemilih')->user()->username }}</span> --}}

        </a>
    </nav>
    <div class="kontainer mx-auto">
        <div class="box-welcome pt-3">
            <h2>Selamat Datang, {{ Auth::guard('pemilih')->user()->username }}!</h2>
        </div>
        @if (!Auth::guard('pemilih')->user()->voted)
            <h4>Kandidat:</h4>
            <div class="box-container mx-auto">
                @foreach ($kandidats as $item)
                    <div class="box-pilih mx-auto mt-3">
                        <span class="qwe">Kandidat {{ $loop->iteration }}</span>
                        <img class="img" src="{{ asset('img/' . $item->image) }}" alt="">
                        {{-- <div class="img"></div> --}}
                        <div class="box-btn">
                            <div class="btn btn-outline-dark qwe" data-toggle="modal" data-target="#exampleModal"
                                data-whatever="{{ $item->id }}">Vote</div>
                            <a href="user/detail/{{ $item->id }}" class="btn btn-outline-dark qwe">Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-success mt-5 p-5" role="alert">
                <h5 style="text-align: center">Kamu telah sukses Memilih!</h5>
            </div>
        @endif
    </div>

    <!-- Modal -->
    @if (!Auth::guard('pemilih')->user()->voted)
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/vote" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @csrf
                        <div class="modal-body px-4">
                            <input type="text" readonly name="id" id="id" hidden>
                            Apakah anda yakin ingin memilih kandidat ini?

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-outline-primary">Pilih</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('script')
    <script src="{{ asset('js/vote.js') }}"></script>
@endpush
