<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    protected $table = 'akun';
    protected $fillable = ['email', 'password', 'role', 'is_verified'];
    public function otps()
    {
        return $this->hasMany(AkunOtp::class);
    }

}
