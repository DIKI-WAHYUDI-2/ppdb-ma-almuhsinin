<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\CalonSiswa;
use App\Models\HasilCbt;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;


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

    public function detailCalonSiswa($id)
    {
        $calon_siswa = CalonSiswa::find($id);

        if (!$calon_siswa) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $orang_tua = OrangTua::where('calon_siswa_id', $calon_siswa->id)->first();
        $berkas = Berkas::where('calon_siswa_id', $calon_siswa->id)->get();
        $nilai = HasilCbt::where('calon_siswa_id', $calon_siswa->id)->first();

        return response()->json([
            "calon_siswa" => $calon_siswa,
            "orang_tua" => $orang_tua,
            "berkas" => $berkas,
            "nilai" => $nilai ?: ['skor' => 0]
        ]);
    }

    public function setKelulusan($id, Request $request)
    {
        $calon_siswa = CalonSiswa::find($id);

        if (!$calon_siswa) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $calon_siswa->update([
            'status_pendaftaran' => $request['status']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil memperbarui status menjadi ' . $request['status']
        ], 200);
    }

}
