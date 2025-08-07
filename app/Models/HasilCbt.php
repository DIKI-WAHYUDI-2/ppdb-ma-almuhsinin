<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilCbt extends Model
{
    protected $table = 'hasil_cbt';
    protected $fillable = [
        'calon_siswa_id',
        'kategori',
        'skor',
        'status'
    ];

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
