<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::get();
        return response()->json([
            'data' => $kategori,
            'msg' => 'kategori buku'
        ], 200);
    }

    public function store(Request $request)
    {
        $kategori = Kategori::create([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        return response()->json([
            'data' => $kategori,
            'msg' => 'berhasil menambah kategori'
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'kode'=> $request->kode,
            'nama'=> $request->nama
        ]);
        return response()->json([
            'msg'=> 'berhasil mengedit kategori'
        ]);
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return response()->json([
            'msg' => 'data berhasil di hapus'
        ], 200);
    }
}
