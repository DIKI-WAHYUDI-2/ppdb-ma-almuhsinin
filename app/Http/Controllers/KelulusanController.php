<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class KelulusanController extends Controller
{
    public function downloadSKL($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        if ($siswa->status_pendaftaran !== 'lulus') {
            abort(403, 'Siswa ini belum dinyatakan lulus seleksi.');
        }
        $pdf = Pdf::loadView('pdf.surat-keterangan-lulus', compact('siswa'));
        return $pdf->download('Surat_Keterangan_Lulus_' . $siswa->nama . '.pdf');
    }
}
