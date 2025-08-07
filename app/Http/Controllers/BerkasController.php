<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\CalonSiswa;
use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerkasController extends Controller
{
    public function create()
    {
        $akun_id = Auth::id();
        $akun = Akun::where('id', $akun_id)->first();
        $calon_siswa = CalonSiswa::where('akun_id', $akun_id)->first();
        $berkas = Berkas::where('calon_siswa_id', $calon_siswa->id)->get();
        return view('calon-siswa.formulir.upload-berkas', compact('berkas', 'calon_siswa', 'akun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pas_foto_3x4' => 'required|image|max:2048',
            'pas_foto_2x3' => 'required|image|max:2048',
            'skl' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'skhun' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'kartu_keluarga' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'akta_kelahiran' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $fields = [
            'pas_foto_3x4' => 'Pas Foto 3x4',
            'pas_foto_2x3' => 'Pas Foto 2x3',
            'skl' => 'SKL',
            'skhun' => 'SKHUN',
            'kartu_keluarga' => 'Kartu Keluarga',
            'akta_kelahiran' => 'Akta Kelahiran'
        ];

        $akun_id = Auth::id();
        $calonSiswa = CalonSiswa::where('akun_id', $akun_id)->first();

        // Pastikan calon siswa ditemukan
        if (!$calonSiswa) {
            return redirect()->back()->with('error', 'Data calon siswa tidak ditemukan');
        }

        foreach ($fields as $field => $label) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $field . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);

                Berkas::create([
                    'calon_siswa_id' => $calonSiswa->id,
                    'jenis_berkas' => $label, // Gunakan label, bukan field name
                    'nama_file' => $filename,
                    'file_path' => 'uploads/' . $filename,
                    'status' => 'belum_diverifikasi',
                    'catatan' => '',
                    'uploaded_at' => now(),
                ]);
            }
        }

        return redirect()->route('calon-siswa.dashboard')->with('success', 'Semua file berhasil diunggah.');
    }

    public function edit($id)
    {
        return view('berkas.edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pas_foto_3x4' => 'nullable|image|max:2048',
            'pas_foto_2x3' => 'nullable|image|max:2048',
            'skl' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'skhun' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'kartu_keluarga' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'akta_kelahiran' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $fields = [
            'pas_foto_3x4' => 'Pas Foto 3x4',
            'pas_foto_2x3' => 'Pas Foto 2x3',
            'skl' => 'SKL',
            'skhun' => 'SKHUN',
            'kartu_keluarga' => 'Kartu Keluarga',
            'akta_kelahiran' => 'Akta Kelahiran'
        ];

        $akun_id = Auth::id();
        $calonSiswa = CalonSiswa::where('akun_id', $akun_id)->first();

        foreach ($fields as $field => $label) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $field . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);

                Berkas::updateOrCreate(
                    [
                        'calon_siswa_id' => $calonSiswa->id,
                        'jenis_berkas' => $label
                    ],
                    [
                        'nama_file' => $filename,
                        'file_path' => 'uploads/' . $filename,
                        'status' => 'belum_diverifikasi',
                        'catatan' => '',
                        'uploaded_at' => now(),
                    ]
                );
            }
        }

        return redirect()->route('calon-siswa.dashboard')->with('success', 'File berhasil diupdate.');
    }

}
