<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\AkunOtp;
use Illuminate\Http\Request;

class SendOtpMailController extends Controller
{
    public function index()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        // Verify OTP logic
        $validated = $request->validate([
            'otp' => 'required|size:6'
        ]);

        $email = session('email') ?? session('reset_password');

        if (!$email) {
            return redirect()->route('register')->with('status', 'Session tidak ditemukan. Silakan daftar ulang.');
        }

        $akun = Akun::where('email', $email)->first();
        if (!$akun) {
            return redirect()->back()->withErrors(['email' => 'Email tidak terdaftar']);
        }

        $otpRecord = AkunOtp::where('akun_id', $akun->id)
            ->where('kode_otp', $validated['otp'])
            ->where('expired_at', '>', now())
            ->first();

        if (!$otpRecord) {
            return redirect()->back()->withErrors(['otp' => 'Kode OTP tidak valid atau sudah expired']);
        }

        $otpRecord->delete();

        if (session('reset_password')) {
            return redirect()->route('login')->with('success', 'Password berhasil diganti!');
        }

        $akun->update(['is_verified' => true]);
        // Redirect to login page
        return redirect()->route('login')->with('success', 'Akun berhasil diverifikasi!');
    }
}
