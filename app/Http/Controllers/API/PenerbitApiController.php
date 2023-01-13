<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Penerbit::get();
        return response()->json([
            'msg' => 'data penerbit',
            'data' => $penerbit,
        ]);
    }

    public function store(Request $request)
    {
        $penerbit = Penerbit::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'verif' => $request->verif,
        ]);

        return response()->json([
            'msg' => 'berhasil menambah penerbit',
            'data' => $penerbit,
        ]);
    }

    public function update(Request $request, $id)
    {
        $penerbit = Penerbit::findOrFail($id);

        $penerbit->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'verif' => $request->verif,
        ]);

        return response()->json([
            'msg'=> 'berhasil mengubah data'
        ]);
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        return response()->json([
            'msg' => 'berhasil menghapus data penerbit'
        ]);
    }
}
