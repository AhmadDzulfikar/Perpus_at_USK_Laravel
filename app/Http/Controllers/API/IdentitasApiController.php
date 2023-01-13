<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identitas = Identitas::get();
        return response()->json([
            'data'=>$identitas,
            'msg' => 'identitas sekolah'
        ]);
    }

    public function store(Request $request)
    {
        $identitas = Identitas::create([
            'nama_app'=> $request->nama_app,
            'alamat_app'=> $request->alamat_app,
            'email_app'=> $request->email_app,
            'nomor_hp'=> $request->nomor_hp,
        ]);
        return response()->json([
            'data' => $identitas,
            'msg' => 'identitas sekolah'
        ]);
    }

    public function update(Request $request, $id)
    {
        $identitas = Identitas::findOrFail($id);

        $identitas->update([
            'nama_app'=> $request->nama_app,
            'alamat_app'=> $request->alamat_app,
            'email_app'=> $request->email_app,
            'nomor_hp'=> $request->nomor_hp
        ]);
        return response()->json([
            'msg'=>'berhasil mengubah identitas applikasi'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
