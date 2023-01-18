<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PeminjamanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::get();
        return response()->json([
            'data'=> $peminjaman,
            'msg'=> 'ini data peminjaman'
        ]);
                
        $peminjaman = Peminjaman::with('user', 'buku')->get();
        $data = [];

        foreach($peminjaman as $value) {
            $datas['user'] = $value->user->username;
            $datas['buku'] = $value->buku->judul;
            $datas['tgl_peminjaman'] = $value->tgl_peminjaman;
            $datas['tgl_pengembalian'] = $value->tgl_pengembalian;
            $datas['kondisi_buku_saat_dipinjam'] = $value->kondisi_buku_saat_dipinjam;
            $datas['kondisi_buku_saat_dikembalikan'] = $value->kondisi_buku_saat_dikembalikan;
            $datas['denda'] = $value->denda;
            $data[] = $datas;
        }
        return response()->json([
            $data
        ]);

    }

    public function store(Request $request)
    {
        $peminjaman = Peminjaman::create([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'kondisi_buku_saat_dipinjam' => $request->kondisi_buku_saat_dipinjam,
            'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
            'denda' => $request->denda,
        ]);

        return response()->json([
            'msg' => 'berhasil menambah data',
            'data'=> $peminjaman,
        ]);
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'kondisi_buku_saat_dipinjam' => $request->kondisi_buku_saat_dipinjam,
            'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
            'denda' => $request->denda,
        ]);
        return response()->json([
            'msg'=>'Peminjaman berhasil di rubah'
        ]);
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return response()->json([
            'msg'=>'data peminjam berhasil dihapus',
        ]);
    }
}
