<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
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
        return view('informasi.informasi-pendaftaran');
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
