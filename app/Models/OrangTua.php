<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'orang_tua';
    protected $fillable = [
        'calon_siswa_id',
        'nama',
        'jenis_orangtua',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'pekerjaan',
        'penghasilan',
        'dusun',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'no_hp',
        'status_kehidupan'
    ];
    public $timestamps = false;
}
