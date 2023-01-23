{{-- @extends('components.user.sidebar')

@section('main')
    <div class="col-2">
            @include('components.user.sidebar')
            
        </div>
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <h1>Buku yang sedang dipinjam</h1>
        </div>
        <div class="col-3">
            <a href="{{ route('user.form_peminjaman') }}" class="btn btn-primary float">Pinjam</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Kondisi Buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamans as $key => $peminjaman)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $peminjaman->user->username }}</td>
                    <td>{{ $peminjaman->buku->judul }}</td>
                    <td>{{ $peminjaman->tgl_peminjaman }}</td>
                    <td>{{ $peminjaman->tgl_pengembalian }}</td>
                    <td>{{ $peminjaman->kondisi_buku_saat_dipinjam }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection --}}

@extends('components.user.sidebar')
@section('main')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <h1>Buku yang sedang dipinjams</h1>
        </div>
        <div class="col-3">
            <a href="{{ route('user.form_peminjaman') }}" class="btn btn-primary float">Pinjam</a>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Kondisi Buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjamans as $key => $peminjaman)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $peminjaman->user->username }}</td>
                                <td>{{ $peminjaman->buku->judul }}</td>
                                <td>{{ $peminjaman->tgl_peminjaman }}</td>
                                <td>{{ $peminjaman->tgl_pengembalian }}</td>
                                <td>{{ $peminjaman->kondisi_buku_saat_dipinjam }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{-- </div> --}}
    </div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css">
    </head>

    <body>
        <script src="assets/js/app.js"></script>
        <script src="/assets/js/extensions/simple-datatables.js"></script>
    </body>

    </html>
@endsection
