<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function anggota()
    {
        $total = User::where('role', 'user')->count();  
        $kode = 'AA00' . $total + 1;
        $anggota = User::where('role', 'user')->get();
        return view('admin.masterdata.anggota', compact('anggota', 'kode'));
    }

    public function storeAnggota(Request $request)
    {
        $kode = User::where('role', 'user')->count();
        $anggota = User::create([
            'kode' => 'AA00' . $kode + 1,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'role' => 'user',
            'join_date' => Carbon::now()
        ]);

        if($anggota){
            return redirect()
                ->back()
                ->with("status", "success")
                ->with("message", "Berhasil Menambah Data");
        }
        return redirect()->back()
            ->with("status", "danger")
            ->with("message", "Gagal menambah data");
    }

    public function hapusAnggota($id)
    {
        $anggota = User::where('role' , 'user')->where('id' , $id);
        $anggota->delete();
        
        return redirect()->back();
    }
}
