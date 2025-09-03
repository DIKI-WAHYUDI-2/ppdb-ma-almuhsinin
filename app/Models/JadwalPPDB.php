<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPPDB extends Model
{
    protected $table = 'jadwal_ppdb'; // tabel yang dipakai
    protected $fillable = ['tahap', 'mulai', 'selesai'];
}
