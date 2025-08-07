<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapPendaftaran extends Model
{
    protected $table = 'rekap_pendaftaran';
    protected $fillable = [
        'jumlah_pendaftar',
        'jumlah_lulus',
        'jumlah_tidak_lulus',
        'tahun_ajaran'
    ];
}
