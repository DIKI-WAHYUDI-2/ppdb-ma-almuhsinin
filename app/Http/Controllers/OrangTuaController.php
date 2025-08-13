<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\CalonSiswa;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrangTuaController extends Controller
{
    public function index()
    {
        return view('calon-siswa.data-orangtua');
    }

    public function create()
    {
        $akun_id = Auth::id();
        $akun = Akun::find($akun_id);

        $email = $akun?->email; // pakai nullsafe operator biar aman
        $calon_siswa = CalonSiswa::where('akun_id', $akun_id)->first();

        if (!$calon_siswa) {
            // Kalau belum ada calon siswa, set default null dan data ortu kosong
            $ayah = null;
            $ibu = null;
        } else {
            $ayah = OrangTua::where('calon_siswa_id', $calon_siswa->id)
                ->where('jenis_orangtua', 'Ayah')
                ->first();
            $ibu = OrangTua::where('calon_siswa_id', $calon_siswa->id)
                ->where('jenis_orangtua', 'Ibu')
                ->first();
        }

        return view('calon-siswa.formulir.data-orangtua', compact(
            'calon_siswa',
            'email',
            'ayah',
            'ibu'
        ));
    }


    public function store(Request $request)
    {
        $request->validate([
            // Validasi ayah
            'nama_ayah' => 'required|string|max:100',
            'tempat_lahir_ayah' => 'required|string|max:100',
            'tanggal_lahir_ayah' => 'required|date',
            'agama_ayah' => 'required|string',
            'pendidikan_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'penghasilan_ayah' => 'required|string',
            'dusun_ayah' => 'required|string',
            'rt_ayah' => 'required|string',
            'rw_ayah' => 'required|string',
            'kelurahan_ayah' => 'required|string',
            'kecamatan_ayah' => 'required|string',
            'no_hp_ayah' => 'required|string',
            'status_kehidupan_ayah' => 'required|string',

            // Validasi ibu
            'nama_ibu' => 'required|string|max:100',
            'tempat_lahir_ibu' => 'required|string|max:100',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required|string',
            'pendidikan_ibu' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
            'penghasilan_ibu' => 'required|string',
            'dusun_ibu' => 'required|string',
            'rt_ibu' => 'required|string',
            'rw_ibu' => 'required|string',
            'kelurahan_ibu' => 'required|string',
            'kecamatan_ibu' => 'required|string',
            'no_hp_ibu' => 'required|string',
            'status_kehidupan_ibu' => 'required|string',
        ]);

        // Ambil ID siswa dari user login (atau bisa juga dari request kalau kamu kirim manual)
        $akun_id = Auth::id();
        $calonSiswa = CalonSiswa::where('akun_id', $akun_id)->first();
        $calonSiswaId = $calonSiswa->id;

        // Simpan data ayah
        OrangTua::create([
            'calon_siswa_id' => $calonSiswaId,
            'nama' => $request->nama_ayah,
            'jenis_orangtua' => 'Ayah',
            'tempat_lahir' => $request->tempat_lahir_ayah,
            'tanggal_lahir' => $request->tanggal_lahir_ayah,
            'agama' => $request->agama_ayah,
            'pendidikan' => $request->pendidikan_ayah,
            'pekerjaan' => $request->pekerjaan_ayah,
            'penghasilan' => $request->penghasilan_ayah,
            'dusun' => $request->dusun_ayah,
            'rt' => $request->rt_ayah,
            'rw' => $request->rw_ayah,
            'kelurahan' => $request->kelurahan_ayah,
            'kecamatan' => $request->kecamatan_ayah,
            'no_hp' => $request->no_hp_ayah,
            'status_kehidupan' => $request->status_kehidupan_ayah,
        ]);

        // Simpan data ibu
        OrangTua::create([
            'calon_siswa_id' => $calonSiswaId,
            'nama' => $request->nama_ibu,
            'jenis_orangtua' => 'Ibu',
            'tempat_lahir' => $request->tempat_lahir_ibu,
            'tanggal_lahir' => $request->tanggal_lahir_ibu,
            'agama' => $request->agama_ibu,
            'pendidikan' => $request->pendidikan_ibu,
            'pekerjaan' => $request->pekerjaan_ibu,
            'penghasilan' => $request->penghasilan_ibu,
            'dusun' => $request->dusun_ibu,
            'rt' => $request->rt_ibu,
            'rw' => $request->rw_ibu,
            'kelurahan' => $request->kelurahan_ibu,
            'kecamatan' => $request->kecamatan_ibu,
            'no_hp' => $request->no_hp_ibu,
            'status_kehidupan' => $request->status_kehidupan_ibu,
        ]);

        return redirect()->route('calon-siswa.upload-berkas')->with('success', 'Data orang tua berhasil disimpan.');
    }

    public function edit(OrangTua $orangtua)
    {
        return view('orangtua.edit', compact('orangtua'));
    }

    public function update(Request $request, OrangTua $orangtua)
    {
        $request->validate([
            // Validasi ayah
            'nama_ayah' => 'required|string|max:100',
            'tempat_lahir_ayah' => 'required|string|max:100',
            'tanggal_lahir_ayah' => 'required|date',
            'agama_ayah' => 'required|string',
            'pendidikan_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'penghasilan_ayah' => 'required|string',
            'dusun_ayah' => 'required|string',
            'rt_ayah' => 'required|string',
            'rw_ayah' => 'required|string',
            'kelurahan_ayah' => 'required|string',
            'kecamatan_ayah' => 'required|string',
            'no_hp_ayah' => 'required|string',
            'status_kehidupan_ayah' => 'required|string',

            // Validasi ibu
            'nama_ibu' => 'required|string|max:100',
            'tempat_lahir_ibu' => 'required|string|max:100',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required|string',
            'pendidikan_ibu' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
            'penghasilan_ibu' => 'required|string',
            'dusun_ibu' => 'required|string',
            'rt_ibu' => 'required|string',
            'rw_ibu' => 'required|string',
            'kelurahan_ibu' => 'required|string',
            'kecamatan_ibu' => 'required|string',
            'no_hp_ibu' => 'required|string',
            'status_kehidupan_ibu' => 'required|string',
        ]);

        $orangtua->update([
            'nama' => $request->nama_ayah,
            'tempat_lahir' => $request->tempat_lahir_ayah,
            'tanggal_lahir' => $request->tanggal_lahir_ayah,
            'agama' => $request->agama_ayah,
            'pendidikan' => $request->pendidikan_ayah,
            'pekerjaan' => $request->pekerjaan_ayah,
            'penghasilan' => $request->penghasilan_ayah,
            'dusun' => $request->dusun_ayah,
            'rt' => $request->rt_ayah,
            'rw' => $request->rw_ayah,
            'kelurahan' => $request->kelurahan_ayah,
            'kecamatan' => $request->kecamatan_ayah,
            'no_hp' => $request->no_hp_ayah,
            'status_kehidupan' => $request->status_kehidupan_ayah,
        ]);

        $orangtua->update([
            'nama' => $request->nama_ibu,
            'tempat_lahir' => $request->tempat_lahir_ibu,
            'tanggal_lahir' => $request->tanggal_lahir_ibu,
            'agama' => $request->agama_ibu,
            'pendidikan' => $request->pendidikan_ibu,
            'pekerjaan' => $request->pekerjaan_ibu,
            'penghasilan' => $request->penghasilan_ibu,
            'dusun' => $request->dusun_ibu,
            'rt' => $request->rt_ibu,
            'rw' => $request->rw_ibu,
            'kelurahan' => $request->kelurahan_ibu,
            'kecamatan' => $request->kecamatan_ibu,
            'no_hp' => $request->no_hp_ibu,
            'status_kehidupan' => $request->status_kehidupan_ibu,
        ]);

        return redirect()->route('calon-siswa.dashboard')->with('success', 'Data orang tua berhasil diperbarui.');
    }

    public function destroy(OrangTua $orangtua)
    {
        $orangtua->delete();
        return redirect()->route('calon-siswa.dashboard')->with('success', 'Data orang tua berhasil dihapus.');
    }
}
