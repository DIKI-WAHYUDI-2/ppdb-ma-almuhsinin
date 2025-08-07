<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use App\Models\Akun;
use App\Models\AkunOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Session;

class AkunController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        Akun::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('akun.index')->with('success', 'Akun berhasil dibuat!');
    }

    public function storeAkunCalonSiswa(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $akun = Akun::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'calon_siswa',
            'is_verified' => false,
        ]);

        $otp = rand(100000, 999999);
        AkunOtp::create([
            'akun_id' => $akun->id,
            'kode_otp' => $otp,
            'expired_at' => now()->addMinutes(5)
        ]);

        Mail::to($akun->email)->send(new SendOtpMail($otp));
        session(['email' => $akun->email]);
        return redirect()->route('verify-otp');
    }

    public function edit($id)
    {
        $akun = Akun::findorFail($id);
        return view('akun.edit', compact('akun'));
    }

    public function update(Request $request, $id)
    {

        $akun = Akun::findorFail($id);

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        $akun->update([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('akun.index')->with('success', 'Akun berhasil diupdate!');
    }

    public function destroy($id)
    {
        $akun = Akun::findorFail($id);
        $akun->delete();

        return redirect()->route('akun.index')->with('success', 'Akun berhasil dihapus!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $akun = Akun::where('email', $credentials['email'])->first();

        if ($akun && Hash::check($credentials['password'], $akun->password)) {
            Auth::login($akun);

            if ($akun->role == 'calon_siswa') {
                return redirect()->route('calon-siswa.dashboard')->with('success', 'Login berhasil!');
            } elseif ($akun->role == 'operator') {
                return redirect()->route('operator.dashboard')->with('success', 'Login berhasil!');
            } elseif ($akun->role == 'kepala_sekolah') {
                return redirect()->route('kepala-sekolah.dashboard')->with('success', 'Login berhasil!');
            }

        } else {
            return redirect()->route('login')->with('error', 'Email atau password salah!');
        }
    }

    public function lupaPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password_baru' => 'required',
            'password_konfirmasi' => 'required'
        ]);

        $akun = Akun::where('email', $validated['email'])->first();

        if ($validated['password_baru'] == $validated['password_konfirmasi']) {
            $akun->update([
                'password' => bcrypt($validated['password_baru'])
            ]);
            session(['reset_password' => $validated['email']]);
            $otp = rand(100000, 999999);
            AkunOtp::create([
                'akun_id' => $akun->id,
                'kode_otp' => $otp,
                'expired_at' => now()->addMinutes(5)
            ]);

            Mail::to($akun->email)->send(new SendOtpMail($otp));
            return redirect()->route('verify-otp');
        }

        return redirect()->route('lupa-password')->with('error', 'Password Salah');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
