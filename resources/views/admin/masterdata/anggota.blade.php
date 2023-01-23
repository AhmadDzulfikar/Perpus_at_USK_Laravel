@extends('components.admin.sidebar')
@section('main')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <h4>Data Anggota E - Perpus</h4>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn shadow btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="bi bi-send"></i>
                    Tambah Anggota
                </button>
                <!-- Modal ADD DATA -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peserta Didik</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action={{ route('admin.tambah_anggota') }} enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode Anggota</label>
                                        <input type="text" class="form-control" name="kode"
                                            value="{{ $kode }}" readonly />
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input type="text" class="form-control" name="nis" placeholder="NIS"
                                                required />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Username" required aria-autocomplete="none" />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input type="text" class="form-control" name="fullname"
                                                placeholder="Fullname" required />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" required autocomplete="new-password" />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <input type="text" class="form-control" name="kelas" placeholder="Kelas"
                                                required />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3" name="alamat"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal ADD DATA -->

                {{-- Modal Delete --}}
                @foreach ($anggota as $a)
                    <div class="modal fade" id="delete-masuk{{ $a->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action={{ url('/masuk/delete/' . $a->id) }} method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        <center class="mt-3">
                                            <h5>
                                                apakah anda yakin ingin menghapus data ini?
                                            </h5>
                                        </center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-danger">Hapus!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- Modal Delete --}}

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nis</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->kode }}</td>
                                <td>{{ $p->nis }}</td>
                                <td>{{ $p->fullname }}</td>
                                <td>{{ $p->kelas }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td><button class="btn shadow btn-outline-danger">Unverified</button></td>
                                <td><a class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete-masuk{{ $p->id }}"> <i
                                            class="badge-circle badge-circle-ligh font-medium-1"
                                            data-feather="trash"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
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
