<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $buku = Buku::get();
        // return response()->json([
        //     'msg' => 'data buku',
        //     'data' => $buku
        // ]);

        $buku = Buku::with('kategori', 'penerbit')->get();
        $data = [];

        foreach ($buku as $value) {
            $datas['judul'] = $value->judul;
            $datas['kategori'] = $value->kategori->nama;
            $datas['penerbit'] = $value->penerbit->nama;
            $datas['pengarang'] = $value->pengarang;
            $datas['tahun_terbit'] = $value->tahun_terbit;
            $datas['isbn'] = $value->isbn;
            $datas['j_buku_baik'] = $value->j_buku_baik;
            $datas['j_buku_rusak'] = $value->j_buku_rusak;
            $data[] = $datas;
        }
        return response()->json([
            $data
        ]);
    }

    public function store(Request $request)
    {
        $buku = Buku::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'isbn' => $request->isbn,
            'j_buku_baik' => $request->j_buku_baik,
            'j_buku_rusak' => $request->j_buku_rusak,
        ]);

        return response()->json([
            'msg' => 'menambah data buku',
            'data' => $buku
        ]);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->update([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'isbn' => $request->isbn,
            'j_buku_baik' => $request->j_buku_baik,
            'j_buku_rusak' => $request->j_buku_rusak,
        ]);

        return response()->json([
            'msg' => 'berhasil mengubah data buku'
        ]);
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return response()->json([
            'msg' => 'berhasil menghapus data buku'
        ], 200);
    }
}
