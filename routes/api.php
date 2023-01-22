<?php

use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

//Penerbit
Route::get('penerbit', [App\Http\Controllers\API\PenerbitApiController::class, 'index']);
Route::post('penerbit', [App\Http\Controllers\API\PenerbitApiController::class, 'store']);
Route::post('penerbit/update/{id}', [App\Http\Controllers\API\PenerbitApiController::class, 'update']);
Route::delete('penerbit/delete/{id}', [App\Http\Controllers\API\PenerbitApiController::class, 'destroy']);

//Kategori
Route::get('kategori', [App\Http\Controllers\API\KategoriApiController::class, 'index']);
Route::post('kategori', [App\Http\Controllers\API\KategoriApiController::class, 'store']);
Route::post('kategori/update/{id}', [App\Http\Controllers\API\KategoriApiController::class, 'update']);
Route::delete('kategori/delete/{id}', [App\Http\Controllers\API\KategoriApiController::class, 'destroy']);

//Pesan
Route::get('pesan', [App\Http\Controllers\API\PesanApiController::class, 'index']);
Route::post('pesan', [App\Http\Controllers\API\PesanApiController::class, 'store']);
Route::post('pesan/update/{id}', [\App\Http\Controllers\API\PesanApiController::class, 'update']);
Route::delete('pesan/delete/{id}', [\App\Http\Controllers\API\PesanApiController::class, 'destroy']);

//Buku
Route::get('buku', [App\Http\Controllers\API\BukuApiController::class, 'index']);
Route::post('buku', [App\Http\Controllers\API\BukuApiController::class, 'store']);
Route::post('buku/update/{id}', [App\Http\Controllers\API\BukuApiController::class, 'update']);
Route::delete('buku/delete/{id}', [\App\Http\Controllers\API\BukuApiController::class, 'destroy']);

//Peminjaman
Route::get('peminjaman', [\App\Http\Controllers\API\PeminjamanApiController::class, 'index']);
Route::post('peminjaman', [\App\Http\Controllers\API\PeminjamanApiController::class, 'store']);
Route::post('peminjaman/update/{id}', [\App\Http\Controllers\API\PeminjamanApiController::class, 'update']);
Route::delete('peminjaman/delete/{id}', [App\Http\Controllers\API\PeminjamanApiController::class, 'destroy']);

//Identitas
Route::get('identitas', [\App\Http\Controllers\API\IdentitasApiController::class, 'index']);
// Route::post('identitas', [\App\Http\Controllers\API\IdentitasApiController::class, 'store']);
Route::post('identitas/update/{id}', [\App\Http\Controllers\API\IdentitasApiController::class, 'update']);

//USER
Route::get('user', [App\Http\Controllers\API\UserApiController::class, 'get']);
Route::get('user/{id}', [App\Http\Controllers\API\UserApiController::class, 'get']);
Route::post('user', [App\Http\Controllers\API\UserApiController::class, 'store_user']);
Route::post('admin', [App\Http\Controllers\API\UserApiController::class, 'store_admin']);

Route::put('user/{id}', [App\Http\Controllers\API\UserApiController::class, 'update']);

Route::put('admin/{id}', [App\Http\Controllers\API\UserApiController::class, 'updateAdmin']);
Route::delete('user/{id}', [App\Http\Controllers\API\UserApiController::class, 'destroy']);
Route::delete('admin/{id}', [App\Http\Controllers\API\UserApiController::class, 'destroyAdmin']);

Route::post('user/{id}', [UserApiController::class, 'update']);


//

// (ADMIN)
// DASHBOARD

// PEMBERITAHUAN
// meminjam & mengembalikan

// MASTER DATA
// data anggota [No, Kode Anggota, NIS, Nama lengkap, kelas, alamat, aksi] (CRUD)
// data penerbit [No, Kode Penerbit, Nama Penerbit, Status(penerbit terverifikasi), Aksi] (CRUD)
// administrator [No, Nama Lengkap, Nama Pengguna, Kata Sandi, Terakhir login, aksi] (CRUD)
// data peminjaman [No, Nama Anggota, judul buku, tanggal peminjaman, tanggal pengembalian, kondisi buku saat dipinjam, kondisi buku saat dikembalikan, denda]

// KATALOG BUKU
// data buku [no, judul buku, pengarang, penerbit, buku baik, buku rusak, jumlah buku, aksi] (CRUD)
// kategori buku [no, nama kategori, aksi] (CRUD)

// LAPORAN PERPUSTAKAAN (PDF)
// tanggal peminjaman
// tanggal pengembalian
// nama anggota (siswa)

// IDENTITAS APPLIKASI (update)
// nama applikasi
// alamat lengkap
// email
// nomor telepon

// PESAN (Create, delete)
// no
// pengirim
// judul pesan
// isi pesan
// status pesan
// tanggal kirim
// aksi

//  ---------------------------------------------------------------

// USER

// PEMINJAMAN BUKU
// formulir peminjaman buku [Nama Anggota(dissable), Judul Buku, Tanggal peminjaman(dissable), Kondisi Buku Saat Dipinjam(baik/rusak)] (STORE)
// riwayat peminjaman buku [no, nama anggota, judul buku, tanggal peminjaman, tanggal pengembalian, kondisi buku saat dipinjam, kondisi buku saat dikembalikan, denda]

// PENGEMBALIAN BUKU
// formulir pengembalian buku [judul buku(relasi ke buku yg dipinjem), tanggal pengembalian(dissable), kondisi buku saat dikembalikan(baik(tidak terkena denda), rusak(denda 20.000), hilang(denda 50.000))] (store)
// riwayat pengembalian buku [no, nama anggota, judul buku, tanggal pengembalian, kondisi buku saat dipinjam, kondisi buku saat dikembalikan, denda]

// PESAN
// pesan masuk(no, pengirim, judul pesan, isi pesan, status pesan, tanggal kirim, aksi) (store, delete)
// pesan terkirim(no, penerima, judul pesan, isi pesan, status pesan, tanggal kirim, aksi) (store, delete)

// PROFILE SAYA (wajib diisi) 
// kode anggota, nis, nama lengkap, nama pengguna, kata sandi, kelas, alamat lengkap (update)

// Logout
