<?php

namespace App\Http\Controllers;
use App\Models\Berkas;
use App\Models\HasilCbt;
use App\Models\OrangTua;
use App\Models\Verifikasi;
use Illuminate\Support\Facades\Auth;
use App\Models\Soal;
use App\Models\Akun;
use App\Models\CalonSiswa;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class CalonSiswaController extends Controller
{
    public function index()
    {
        $akun_id = Auth::id();
        $calon_siswa = CalonSiswa::where('akun_id', $akun_id)->first();

        // Default value kalau calon siswa belum ada
        if (!$calon_siswa) {
            $verifikasi = (object) ['status' => 'belum lengkap'];
            $data_diri = false;
            $jumlah_berkas = 0;
            $jumlah_data_ortu = 0;
            $jumlah_tes_dikerjakan = 0;
        } else {
            $verifikasi = Verifikasi::where('calon_siswa_id', $calon_siswa->id)->first()
                ?? (object) ['status' => 'belum lengkap'];

            $data_diri = true;
            $jumlah_berkas = Berkas::where('calon_siswa_id', $calon_siswa->id)->count();
            $jumlah_data_ortu = OrangTua::where('calon_siswa_id', $calon_siswa->id)->count();
            $jumlah_tes_dikerjakan = HasilCbt::where('calon_siswa_id', $calon_siswa->id)->count();
        }

        $akun = Akun::find($akun_id);
        $pengumuman = Pengumuman::all();

        $progress = round(((
            (min($jumlah_berkas, 6) / 6) +
            (min($jumlah_data_ortu, 2) / 2) +
            (min($jumlah_tes_dikerjakan, 3) / 3)
        ) / 3) * 100);

        return view('calon-siswa.dashboard', compact(
            'verifikasi',
            'data_diri',
            'calon_siswa',
            'pengumuman',
            'jumlah_berkas',
            'progress',
            'akun'
        ));
    }


    public function create()
    {
        $akun_id = Auth::id();
        $akun = Akun::where('id', $akun_id)->first();
        $calon_siswa = CalonSiswa::where('akun_id', $akun_id)->first();
        return view('calon-siswa.formulir.data-diri', compact('calon_siswa', 'akun'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'anak_keberapa' => 'required',
            'jumlah_saudara' => 'required',
            'hobi' => 'required',
            'cita_cita' => 'required',
            'dusun' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'no_hp' => 'required',
            'tempat_tinggal_sekarang' => 'required',
            'asal_sekolah' => 'required',
            'status_sekolah' => 'required',
            'nisn' => 'required',
            'nomor_peserta_un' => 'required'
        ]);

        $akun_id = Auth::id();

        CalonSiswa::create([
            'akun_id' => $akun_id,
            'nama_lengkap' => $validated['nama_lengkap'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'agama' => $validated['agama'],
            'anak_keberapa' => $validated['anak_keberapa'],
            'jumlah_saudara' => $validated['jumlah_saudara'],
            'hobi' => $validated['hobi'],
            'cita_cita' => $validated['cita_cita'],
            'dusun' => $validated['dusun'],
            'rt' => $validated['rt'],
            'rw' => $validated['rw'],
            'kelurahan' => $validated['kelurahan'],
            'kecamatan' => $validated['kecamatan'],
            'no_hp' => $validated['no_hp'],
            'tempat_tinggal_sekarang' => $validated['tempat_tinggal_sekarang'],
            'asal_sekolah' => $validated['asal_sekolah'],
            'status_sekolah' => $validated['status_sekolah'],
            'nisn' => $validated['nisn'],
            'nomor_peserta_un' => $validated['nomor_peserta_un'],
            'status_pendaftaran' => 'menunggu verifikasi'
        ]);

        return redirect()->route('calon-siswa.data-orangtua')->with('success', 'Data calon siswa berhasil disimpan.');
    }

    public function edit($id)
    {
        $calonSiswa = CalonSiswa::findorFail($id);
        return view('calon-siswa.formulir.edit', compact('calonSiswa'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'anak_keberapa' => 'required',
            'jumlah_saudara' => 'required',
            'hobi' => 'required',
            'cita_cita' => 'required',
            'dusun' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'no_hp' => 'required',
            'tempat_tinggal_sekarang' => 'required',
            'asal_sekolah' => 'required',
            'status_sekolah' => 'required',
            'nisn' => 'required',
            'nomor_peserta_un' => 'required'
        ]);


        $calonSiswa = CalonSiswa::findorFail($id);
        $calonSiswa->update([
            'nama_lengkap' => $validated['nama_lengkap'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'agama' => $validated['agama'],
            'anak_keberapa' => $validated['anak_keberapa'],
            'jumlah_saudara' => $validated['jumlah_saudara'],
            'hobi' => $validated['hobi'],
            'cita_cita' => $validated['cita_cita'],
            'dusun' => $validated['dusun'],
            'rt' => $validated['rt'],
            'rw' => $validated['rw'],
            'kelurahan' => $validated['kelurahan'],
            'kecamanatan' => $validated['kecamatan'],
            'no_hp' => $validated['no_hp'],
            'tempat_tinggal_sekarang' => $validated['tempat_tinggal_sekarang'],
            'asal_sekolah' => $validated['asal_sekolah'],
            'status_sekolah' => $validated['status_sekolah'],
            'nisn' => $validated['nisn'],
            'nomor_peserta_un' => $validated['nomor_peserta_un']
        ]);

        return redirect()->route('calon-siswa.dashboard')->with('success', 'Data calon siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $calonSiswa = CalonSiswa::findorFail($id);
        $calonSiswa->delete();
        return redirect()->route('calon-siswa.index')->with('success', 'Data calon siswa berhasil dihapus.');
    }

    public function kelulusan()
    {
        $calon_siswa = CalonSiswa::withAvg('hasilCbt', 'skor')->get();
        $jumlah_siswa_lulus = CalonSiswa::where('status_pendaftaran', 'lulus')->count();
        $jumlah_siswa_tidak_lulus = CalonSiswa::where('status_pendaftaran', 'tidak_lulus')->count();
        $jumlah_siswa_belum_diverifikasi = CalonSiswa::where('status_pendaftaran', 'menunggu verifikasi')->count();
        return view('operator.kelulusan', compact('calon_siswa', 'jumlah_siswa_lulus', 'jumlah_siswa_tidak_lulus', 'jumlah_siswa_belum_diverifikasi'));
    }

    public function cbt()
    {
        $akun_id = Auth::id();
        $calon_siswa = CalonSiswa::where('akun_id', $akun_id)->first();

        if (!$calon_siswa) {
            return redirect()->route('calon-siswa.data-diri')
                ->with('error', 'Silakan lengkapi data diri Anda terlebih dahulu.');
        }

        $hasil_cbt = HasilCbt::where('calon_siswa_id', $calon_siswa->id)->first();
        $total_soal = Soal::count();
        $soal = Soal::select('kategori')->distinct()->get();

        return view('calon-siswa.cbt.index', compact('calon_siswa', 'hasil_cbt', 'soal', 'total_soal'));
    }



    public function mulaiCbt()
    {
        $soal = Soal::inRandomOrder()->take(20)->get();
        return view('calon-siswa.cbt.test', compact('soal'));
    }

    public function submitCbt(Request $request)
    {
        $akun_id = Auth::id();
        $calon_siswa = CalonSiswa::where('akun_id', $akun_id)->first();

        $jawaban = $request->input('jawaban');
        $kategori = $request->input('kategori');

        // Hitung skor
        $benar = 0;
        $total = count($jawaban);

        foreach ($jawaban as $soal_id => $jawaban_user) {
            $soal = Soal::find($soal_id);
            if ($soal && $soal->jawaban_benar == $jawaban_user) {
                $benar++;
            }
        }

        $skor = ($benar / $total) * 100;

        // Simpan hasil
        HasilCbt::updateOrCreate(
            ['calon_siswa_id' => $calon_siswa->id],
            ['skor' => $skor, 'status' => 'selesai']
        );

        return view('calon-siswa.cbt.hasil', compact('skor', 'benar', 'total'));
    }

}
