<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\KelulusanController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SendOtpMailController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\OperatorController;
use App\Mail\SendOtpMail;
use App\Models\Akun;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AkunController::class, 'login'])->name('login.post');
Route::post("/logout", [AkunController::class, 'logout'])->name('logout');
Route::get('/lupa-password', function () {
    return view('auth.lupa-password');
})->name('lupa-password');
Route::post("/lupa-password", [AkunController::class, 'lupaPassword'])->name('verify-otp.lupa-password');

// Register routes
Route::get('/register', [AkunController::class, 'create'])->name('register');
Route::post('/register', [AkunController::class, 'storeAkunCalonSiswa'])->name('register.post');

// OTP Verification routes
Route::get('/verify-otp', [SendOtpMailController::class, 'index'])->name('verify-otp');
Route::post('/verify-otp', [SendOtpMailController::class, 'verifyOtp'])->name('verify-otp.post');

Route::get('/test-email', function () {
    Mail::to('muhammaddikiw02@gmail.com')->send(new SendOtpMail('123456'));
    return 'Email berhasil dikirim (cek Mailtrap)';
});

// Dashboard Calon Siswa routes
Route::get('/dashboard/calon-siswa', [CalonSiswaController::class, 'index'])->name('calon-siswa.dashboard');

// Data Calon Siswa routes
Route::get('/dashboard/calon-siswa/data-diri', [CalonSiswaController::class, 'create'])->name('calon-siswa.data-diri');
Route::post('/dashboard/calon-siswa/data-diri', [CalonSiswaController::class, 'store'])->name('calon-siswa.store');
Route::put('/dashboard/calon-siswa/data-diri/{id}', [CalonSiswaController::class, 'update'])->name('calon-siswa.update');

// Data Orang Tua routes
Route::get('/dashboard/calon-siswa/data-orangtua', [OrangTuaController::class, 'create'])->name('calon-siswa.data-orangtua');
Route::post('/dashboard/calon-siswa/data-orangtua', [OrangTuaController::class, 'store'])->name('orangtua.store');
Route::put('/dashboard/calon-siswa/data-orangtua/{id}', [OrangTuaController::class, 'update'])->name('orangtua.update');

// Upload Berkas routes
Route::get('/dashboard/calon-siswa/upload-berkas', [BerkasController::class, 'create'])->name('calon-siswa.upload-berkas');
Route::post('/dashboard/calon-siswa/upload-berkas', [BerkasController::class, 'store'])->name('upload-berkas.store');
Route::put('/dashboard/calon-siswa/upload-berkas/{id}', [BerkasController::class, 'update'])->name('upload-berkas.update');

// CBT routes
Route::get('/dashboard/calon-siswa/cbt', [CalonSiswaController::class, 'cbt'])->name('calon-siswa.cbt');
Route::get('/dashboard/calon-siswa/cbt/mulai/{id}', [CalonSiswaController::class, 'mulaiCbt'])->name('calon-siswa.cbt.mulai');
Route::post('/dashboard/calon-siswa/cbt/submit', [CalonSiswaController::class, 'submitCbt'])->name('calon-siswa.cbt.submit');

Route::get('/surat-keterangan-lulus/{id}', [KelulusanController::class, 'downloadSKL'])
    ->name('surat.keterangan.lulus');

// Operator Dashboard routes
Route::prefix('operator')->group(function () {
    Route::get('/dashboard', [OperatorController::class, 'dashboard'])->name('operator.dashboard');

    // Optimasi dengan resource route dan middleware
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/pengumuman/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

    Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('operator.verifikasi');
    Route::get('/verifikasi/calon-siswa/{id}', [VerifikasiController::class, 'getBerkas'])->name('operator.verifikasi.get-berkas');
    Route::post('/verifikasi/berkas/{id}', [VerifikasiController::class, 'verifikasiBerkas'])->name('operator.verifikasi.berkas');

    Route::get('/kelulusan', [CalonSiswaController::class, 'kelulusan'])->name('operator.kelulusan');
});

Route::prefix('kepala-sekolah')->group(function () {
    Route::get('/dashboard', [KepalaSekolahController::class, 'dashboard'])->name('kepala-sekolah.dashboard');
    Route::get('/laporan', [KepalaSekolahController::class, 'laporan'])->name('kepala-sekolah.laporan');
});

Route::get('/test-verifikasi', [VerifikasiController::class, 'testVerifikasi']);

Route::get('/test-buat-akun', function () {
    Akun::create([
        'email' => 'ma-almuhsinin@gmail.com',
        'password' => bcrypt('123456'),
        'role' => 'kepala_sekolah',
        'is_verified' => true,
    ]);
});


Route::get('/test-buat-akun-operator', function () {
    Akun::create([
        'email' => 'operator@gmail.com',
        'password' => bcrypt('123456'),
        'role' => 'operator',
        'is_verified' => true,
    ]);
});
