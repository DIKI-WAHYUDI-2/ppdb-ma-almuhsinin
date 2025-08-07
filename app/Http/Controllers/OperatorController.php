<?php

namespace App\Http\Controllers;
use App\Models\Akun;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    public function dashboard()
    {
        $akun_id = Auth::id();
        $akun = Akun::where('id', $akun_id)->first();
        $jumlah_pendaftar = CalonSiswa::count();
        $jumlah_menunggu_verifikasi = CalonSiswa::where('status_pendaftaran', 'menunggu verifikasi')->count();
        $jumlah_lulus = CalonSiswa::where('status_pendaftaran', 'lulus')->count();
        return view('operator.dashboard', compact('akun', 'jumlah_pendaftar', 'jumlah_menunggu_verifikasi', 'jumlah_lulus'));
    }
}
