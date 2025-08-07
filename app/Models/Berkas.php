<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas';
    protected $fillable = ['calon_siswa_id', 'jenis_berkas', 'nama_file', 'file_path', 'status', 'catatan', 'uploaded_at'];
    public $timestamps = false;
}
