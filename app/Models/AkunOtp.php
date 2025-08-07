<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AkunOtp extends Model
{
    protected $table = 'akun_otps';
    protected $fillable = ['akun_id', 'kode_otp', 'expired_at'];
    const UPDATED_AT = null;
    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }
}
