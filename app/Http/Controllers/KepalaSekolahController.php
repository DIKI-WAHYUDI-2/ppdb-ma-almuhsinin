<?php

namespace App\Http\Controllers;
use App\Models\CalonSiswa;
use App\Models\RekapPendaftaran;

use Illuminate\Http\Request;

class KepalaSekolahController extends Controller
{
    public function dashboard()
    {
        // Data tahun ini
        $tahun_sekarang = date('Y');
        $jumlah_pendaftar = CalonSiswa::count();
        $jumlah_lulus = CalonSiswa::where('status_pendaftaran', 'lulus')->count();
        $jumlah_tidak_lulus = CalonSiswa::where('status_pendaftaran', 'tidak_lulus')->count();
        $jumlah_menunggu = CalonSiswa::where('status_pendaftaran', 'menunggu verifikasi')->count();

        // Data rekap per tahun (5 tahun terakhir)
        $rekap_tahunan = RekapPendaftaran::orderBy('tahun_ajaran', 'desc')
            ->take(5)
            ->get();

        // Data untuk grafik
        $data_grafik = $rekap_tahunan->map(function ($item) {
            return [
                'tahun' => $item->tahun_ajaran,
                'pendaftar' => $item->jumlah_pendaftar,
                'lulus' => $item->jumlah_lulus,
                'tidak_lulus' => $item->jumlah_tidak_lulus
            ];
        })->reverse()->values();

        return view('kepala-sekolah.dashboard', compact(
            'jumlah_pendaftar',
            'jumlah_lulus',
            'jumlah_tidak_lulus',
            'jumlah_menunggu',
            'rekap_tahunan',
            'data_grafik',
            'tahun_sekarang'
        ));
    }
}
