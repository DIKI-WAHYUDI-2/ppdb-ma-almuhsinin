<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    protected $table = 'calon_siswa';
    protected $fillable = [
        'akun_id',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'anak_keberapa',
        'jumlah_saudara',
        'hobi',
        'cita_cita',
        'dusun',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'no_hp',
        'tempat_tinggal_sekarang',
        'asal_sekolah',
        'status_sekolah',
        'nisn',
        'nomor_peserta_un',
        'status_pendaftaran',
    ];
    const UPDATED_AT = null;
    public function berkas()
    {
        return $this->hasMany(Berkas::class);
    }

    public function hasilCbt()
    {
        return $this->hasMany(HasilCbt::class, 'calon_siswa_id');
    }

}
