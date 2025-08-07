<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    protected $table = 'verifikasi';
    protected $fillable = ['calon_siswa_id', 'operator_id', 'status', 'catatan', 'tanggal_verifikasi'];
    public $timestamps = false;
}
