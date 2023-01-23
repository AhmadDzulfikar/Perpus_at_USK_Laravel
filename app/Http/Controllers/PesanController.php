<?php

namespace App\Http\Controllers;

use App\Models\pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pesan_terkirim()
    {
        $pesan = Pesan::where('penerima_id', '!=', Auth::user()->id )
        ->where('pengirim_id', Auth::user()->id)
        ->get();
        $penerimas = User::where('role', 'admin')
        ->get();
        return view('user.pesan_terkirim', compact('pesan', 'penerimas'));
    }


    public function pesan_masuk(Request $request)
    {
        $masuk = Pesan::where('pengirim_id', '!=', Auth::user()->id)
        ->where('penerima_id', Auth::user()->id)
        ->get();

        $notif = Pesan::where('id', $request->status)->first();
        if ($request->status == 'terkirim') {
            $notif->update([
                'terkirim'=> $notif->terkirim + 1
            ]);
        }

        return view('user.pesan_masuk', compact('masuk'));
    }
    public function kirim_pesan(Request $request)
    {
        $pesan = Pesan::create($request->all());
        $admin = User::where('id', $request->penerima_id)->first();
        return redirect()
            ->back()
            ->with('status', 'success')
            ->with('message', "Berhasil mengirim pesan ke $admin->fullname");
    }

    public function ubah_status(Request $request)
    {
        $status = Pesan::where('id', $request->id)->first();
        $status->update([
            'status' => 'dibaca'
        ]);
        return redirect()->route('user.pesan_masuk');
    }

}
