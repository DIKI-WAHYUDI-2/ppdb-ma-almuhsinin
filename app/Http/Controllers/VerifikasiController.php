<?php

namespace App\Http\Controllers;
use App\Models\Berkas;
use App\Models\CalonSiswa;
use App\Models\Verifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifikasiController extends Controller
{
    public function index()
    {
        $calon_siswa = CalonSiswa::with('berkas')
            ->where('status_pendaftaran', 'menunggu verifikasi')
            ->get();
        $jumlah_menunggu_verifikasi = CalonSiswa::with('berkas')
            ->where('status_pendaftaran', 'menunggu verifikasi')
            ->count();
        return view('operator.verifikasi', compact('calon_siswa', 'jumlah_menunggu_verifikasi'));
    }

    public function getBerkas($id)
    {
        $siswa = CalonSiswa::with('berkas')->findOrFail($id);
        $data = [
            'nama' => $siswa->nama_lengkap,
            'berkas' => $siswa->berkas,
        ];

        return response()->json($data);
    }

    public function verifikasiBerkas(Request $request, $id)
    {
        try {

            $validated = $request->validate([
                'status' => 'required|in:valid,tidak_valid',
                'catatan' => 'nullable|string',
            ]);

            $akun_id = Auth::id();
            $berkas = Berkas::findOrFail($id);
            $calon_siswa = CalonSiswa::findOrFail($berkas->calon_siswa_id);

            if ($request->status == 'valid') {
                Verifikasi::updateOrCreate(
                    [
                        'calon_siswa_id' => $calon_siswa->id,
                        'operator_id' => '27'
                    ],
                    [
                        'status' => 'lengkap',
                        'catatan' => $request->catatan ?? '',
                        'tanggal_verifikasi' => now(),
                    ]
                );
            } else {
                Verifikasi::updateOrCreate(
                    [
                        'calon_siswa_id' => $calon_siswa->id,
                        'operator_id' => '27'
                    ],
                    [
                        'status' => 'belum_lengkap',
                        'catatan' => $request->catatan ?? '',
                        'tanggal_verifikasi' => now(),
                    ]
                );
            }

            $berkas->update([
                'status' => $validated['status'],
                'catatan' => $request->catatan ?? '',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Berkas berhasil diverifikasi!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memverifikasi berkas: ' . $e->getMessage()
            ], 500);
        }
    }

    public function testVerifikasi()
    {
        $berkas = Berkas::findOrFail(25);
        $calon_siswa = CalonSiswa::findOrFail($berkas->calon_siswa_id);
        dd($calon_siswa);
    }
}
