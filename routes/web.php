<?php

use App\Http\Controllers\PengembalianController;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->group(function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

//USER
Route::prefix('user')->group(function(){
    Route::get('/dashboard', function(){
        $pemberitahuans = Pemberitahuan::where('status', 'aktif')->get();
        $bukus = Buku::all();
        return view('user.dashboard', compact("pemberitahuans", "bukus"));
    })->name('user.dashboard');

//PEMINJAMAN
    Route::get('/peminjaman', function(){
        $peminjamans = Peminjaman::where('user_id', Auth::user()->id)->get();
        return view('user.peminjaman', compact('peminjamans'));
    })->name('user.peminjaman');

//FORM PEMINJAMAN
    Route::get('/peminjaman/form', function(){
        $bukus = Buku::all();

        return view('user.form_peminjaman', compact('bukus'));
    })->name('user.form_peminjaman');

    Route::post('form_peminjaman', function(Request $request){
        $buku_id = $request->buku_id;
        $bukus = Buku::all();

        return view('user.form_peminjaman', compact("bukus", "buku_id"));
    })->name('user.form_peminjaman_dashboard');

    Route::post('submit_peminjaman', function(Request $request){
        $peminjaman = Peminjaman::create($request->all());

        if($peminjaman){
            return redirect()->route("user.peminjaman")
                ->with("status", "success")
                ->with("message", "Berhasil Menambah Data");
        }
        return redirect()->back()
            ->with("status", "danger")
            ->with("message", "Gagal menambah data");
    })->name('user.submit_peminjaman');

//PENGEMBALIAN
    // Route::get('/pengembalian', function(){
    //     return view('user.pengembalian');
    // })->name('user.pengembalian');

    Route::get('/pengembalian', [PengembalianController::class, 'form_pengembalian'])->name('user.form_pengembalian');
    Route::post('submit_pengembalian', [PengembalianController::class, 'submit_pengembalian'])->name('user.submit_pengembalian'); 
    
    Route::get('riwayat-pengembalian', [PengembalianController::class, 'riwayat_pengembalian'])->name('user.pengembalian');

//PESAN
    Route::get('/pesan', function(){
        return view('user.pesan');
    })->name('user.pesan');

//PROFILE
    Route::get('/profile', function(){
        return view('user.profil');
    })->name('user.profil');

    Route::put('profile', function(Request $request){
        $id = Auth::user()->id;

        $imageName = time().'.'.$request->foto->extension();

        $request->foto->move(public_path('img'), $imageName);

        $user = User::find(Auth::user()->id)->update($request->all());

        $user2 = User::find($id)->update([
            "password" => Hash::make($request->password),
            "foto" => "/img/" . $imageName
        ]);

        if($user && $user2) {
            return redirect()->back()->with("status", "success")->with('message', 
            'Berhasil mengubah profile');
        }
            return redirect()->back()->with("status", "danger")->with('message', 'Gagal mengubah profile');
    })->name('user.profil.update');
    
});