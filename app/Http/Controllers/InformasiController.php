<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\JadwalPPDB;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function halamanInformasiSekolah()
    {
        return view('informasi.informasi-sekolah');
    }

    public function halamanInformasiPendaftaran()
    {
        $jadwal = JadwalPPDB::all();
        return view('informasi.informasi-pendaftaran', compact('jadwal'));
    }

    public function halamanInformasiGrafik()
    {
        // Ambil total pendaftar per bulan
        $pendaftar = CalonSiswa::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return view('informasi.grafik-pendaftaran', compact('pendaftar'));
    }
}
